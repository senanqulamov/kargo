<?php

namespace App\Http\Controllers\userpanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Models\AdditionalService;
use App\Models\Amazon_order;
use App\Models\Branch;
use App\Models\Cargo_document;
use App\Models\Cargo_request;
use App\Models\CargoCompany;
use App\Models\Country;
use App\Models\Faqs;
use App\Models\FaqsCategory;
use App\Models\Forme_request;
use App\Models\Notification;
use App\Models\Package;
use App\Models\Product;
use App\Models\SpecialOffer;
use App\Models\Support_demand;
use App\Models\Support_message;
use App\Models\Usage;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Shuchkin\SimpleXLSX;
use stdClass;
use Milon\Barcode\DNS1D;

class SimplePages extends Controller
{
    public function share_and_earn()
    {
        return view('userpanel.helpers.share_and_earn');
    }

    public function get_referance_url($url){
        dd($url);
    }

    public function support()
    {
        $orders = Cargo_request::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();
        $support_demands = Support_demand::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();
        $support_messages = Support_message::where('user_id', Auth::user()->id)
            ->orderBy('support_id', 'DESC')
            ->get();

        $chats = $support_messages->groupBy('support_id');
        return view(
            'userpanel.helpers.support',
            compact('orders', 'support_demands', 'support_messages', 'chats')
        );
    }

    public function support_demand(Request $request)
    {
        // dd($request->all());

        if (!$request->orders) {
            return Redirect::back()->with('error', 'Invalid arguments');
        }

        if ($request->document) {
            $file = $request->document;
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/files/support/', $name);
        } else {
            $name = '';
        }

        $data = [
            'user_id' => Auth::user()->id,
            'orders' => json_encode($request->orders),
            'cause' => $request->cause,
            'status' => 'pending',
            'title' => $request->title,
            'text' => json_encode($request->text),
            'document' => $name,
        ];
        Support_demand::create($data);

        $support_demand = Support_demand::where([
            ['title', $request->title],
            ['user_id', Auth::user()->id],
            ['document', $name],
        ])
            ->get()
            ->first();

        $message_data = [
            'by' => 'user',
            'support_id' => $support_demand->id,
            'user_id' => Auth::user()->id,
            'moderator_id' => 0,
            'message' => json_encode($request->text),
        ];
        Support_message::create($message_data);

        return Redirect::back()->with(
            'message',
            'Your support demand succesfully sent'
        );
    }

    public function sendMessage(Request $request)
    {
        $demand_data = [
            'status' => 'pending',
        ];
        Support_demand::where('id', $request->id)->update($demand_data);

        $message_data = [
            'by' => 'user',
            'support_id' => $request->id,
            'user_id' => Auth::user()->id,
            'moderator_id' => 0,
            'message' => json_encode($request->message),
        ];
        Support_message::create($message_data);

        return response()->json('Your support demand message succesfully sent');
    }

    public function calculator()
    {
        $cargo_companies = DB::table('cargo_companies')->get();
        $countries = DB::table('countries')->get();

        return view(
            'userpanel.helpers.calculator',
            compact('cargo_companies', 'countries')
        );
    }

    public function notifications()
    {
        $notifications = Notification::all();
        return view(
            'userpanel.helpers.notifications',
            compact('notifications')
        );
    }

    public function getnotification(Request $request)
    {
        $notification = Notification::where('id', $request->id)->first();
        return response()->json($notification);
    }

    public function locations()
    {
        $locations = Branch::all();

        return view('userpanel.helpers.locations', compact('locations'));
    }

    public function siteusage()
    {
        $usages = Usage::all();

        return view('userpanel.faq.siteusage', compact('usages'));
    }

    public function buyforme()
    {
        $countries = DB::table('countries')
            ->select('name', 'code', 'id')
            ->get();
        $cargo_companies = DB::table('cargo_companies')->get();
        $user_addresses = DB::table('user_addresses')
            ->where('userID', Auth::user()->id)
            ->get();
        $additional_services = DB::table('additional_services')->get();
        $currencies = DB::table('currencies')->get();
        $forme_orders = Forme_request::where(
            'user_id',
            Auth::user()->id
        )->get();

        return view('userpanel.order.buyforme')->with([
            'countries' => $countries,
            'user_addresses' => $user_addresses,
            'cargo_companies' => $cargo_companies,
            'additional_services' => $additional_services,
            'currencies' => $currencies,
            'forme_orders' => $forme_orders,
        ]);
    }

    public function post_buyforme(Request $request)
    {
        $cargo_id = random_int(10000000, 99999999);
        $cargo_id = 'B' . $cargo_id;

        $rules = [
            'name' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'product_name' => 'required',
            'product_link' => 'required',
            'product_count' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->with(
                'error',
                'Fill all needed inputs to be able send order request'
            );
        }

        $order_request = [
            'id' => $cargo_id,
            'order_type' => 'Buy For Me',
            'status' => 'pending',
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'country' => $request->country,
            'city' => $request->city,
            'state' => $request->state,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'phone' => $request->phone,
            'email' => $request->email,
            'product_name' => $request->product_name,
            'product_count' => $request->product_count,
            'product_link' => $request->product_link,
            'product_note' => $request->product_note,
        ];

        Forme_request::create($order_request);

        if ($request->save_address && $request->country) {
            $new_user_address = [
                'name' => $request->name,
                'city' => $request->city,
                'country' => $request->country,
                'state' => $request->state,
                'address' => $request->address,
                'zipcode' => $request->zipcode,
                'phone' => $request->phone,
                'email' => $request->email,
                'userID' => Auth::user()->id,
            ];
            UserAddress::create($new_user_address);
        }

        return Redirect::back()->with(
            'message',
            'Buy For Me order successfully sent'
        );
    }

    public function order_status_action(Request $request)
    {
        $id = $request->id;
        $request->request->remove('id');
        $data = collect(request()->all())
            ->filter(function ($value) {
                return null !== $value;
            })
            ->toArray();

        $order = Forme_request::where('id', $id)->first();
        Forme_request::where('id', $id)->update($data);

        if ($request->status == 'cancelled') {
            $message = 'Order cancelled';
        } elseif ($request->status == 'payment') {
            $message = 'Order accepted and paid succesfully';

            $total_cargo_price =
                $order->product_price + $order->cargo_price + $order->comission;
            $new_user_balance = Auth::user()->balance - $total_cargo_price;

            User::where('id', Auth::user()->id)->update([
                'balance' => $new_user_balance,
            ]);

            $data = new stdClass();
            $data->user_id = Auth::user()->id;
            $data->payment_id = null;
            $data->old_balance = Auth::user()->balance;
            $data->new_balance = $new_user_balance;
            $data->transfer_method = 'Payment for Buy for me order: ' . $id;

            (new HelperController())->checkTransaction($data);
        }

        return response()->json($message);
    }

    public function amazon_order()
    {
        $countries = DB::table('countries')
            ->select('name', 'code', 'id')
            ->get();
        $cargo_companies = DB::table('cargo_companies')->get();
        $user_addresses = DB::table('user_addresses')
            ->where('userID', Auth::user()->id)
            ->get();
        $additional_services = DB::table('additional_services')->get();
        $currencies = DB::table('currencies')->get();

        return view('userpanel.order.amazon')->with([
            'countries' => $countries,
            'user_addresses' => $user_addresses,
            'cargo_companies' => $cargo_companies,
            'additional_services' => $additional_services,
            'currencies' => $currencies,
        ]);
    }

    public function postAmazonorder(Request $request)
    {
        // dd($request->all());

        // $cargo_id = uniqid(15);
        $cargo_id = random_int(10000000, 99999999);
        $cargo_id = 'A' . $cargo_id;

        if ($request->package_id && $request->product_id) {
            foreach ($request->package_id as $package_id) {
                $packages[] = $package_id;
            }
            $packages = array_unique($packages);

            if ($request->hasfile('document')) {
                foreach ($request->file('document') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/files/', $name);
                    $data[] = $name;
                }
                $data = array_unique($data);
            } else {
                $data = [];
            }

            $additional_services = json_encode(
                $request->additional_services,
                true
            );
            $company_values = json_encode($request->company_value, true);

            $order_request = [
                'id' => $cargo_id,
                'order_type' => 'Amazon Order',
                'user_id' => Auth::user()->id,
                'amazon_address' => $request->amazon_address,
                'name' => $request->name,
                'country' => $request->country,
                'city' => $request->city,
                'state' => $request->state,
                'address' => $request->address,
                'zipcode' => $request->zipcode,
                'email' => 'info@shiplounge.com',
                'phone' => '994515367952',
                'ioss_number' => $request->ioss_number,
                'vat_number' => $request->vat_number,
                'currency' => $request->currency_unit,
                'order_info' => $request->order_info,
                'packages' => json_encode($packages),
                'additional_services' => $additional_services,
                'total_cargo_price' => $request->total_cargo_price,
                'total_weight' => $request->total_weight,
                'total_volume' => $request->total_volume,
                'total_deci' => $request->total_deci,
                'total_count' => $request->total_count,
                'total_worth' => $request->total_worth,
                'cargo_company' => $request->cargo_company,
                'company_value' => $company_values,
                'battery' => $request->battery,
                'liquid' => $request->liquid,
                'food' => $request->food,
                'dangerous' => $request->dangerous,
                'document' => json_encode($data),
            ];

            Amazon_order::create($order_request);

            foreach ($request->package_id as $key => $value) {
                $packagesS = [
                    'id' => $value,
                    'cargo_id' => $cargo_id,
                    'package_count' => $request->package_count[$value],
                    'package_type' => $request->package_type[$value],
                    'package_length' => $request->package_length[$value],
                    'package_width' => $request->package_width[$value],
                    'package_height' => $request->package_height[$value],
                    'package_weight' => $request->package_weight[$value],
                    'barcode' => $request->barcode[$value],
                ];
                Package::create($packagesS);
            }

            foreach ($request->package_id as $key => $package_id) {
                $sku_code = collect($request->sku_code[$package_id]);
                $count = collect($request->count[$package_id]);
                $product = collect($request->product[$package_id]);
                $weight = collect($request->weight[$package_id]);
                $price = collect($request->price[$package_id]);
                $gtip_code = collect($request->gtip_code[$package_id]);

                foreach (
                    $request->product_id[$package_id]
                    as $key => $product_id
                ) {
                    $productsS = [
                        'cargo_id' => $cargo_id,
                        'package_id' => $package_id,
                        'sku_code' => $sku_code[$product_id],
                        'count' => $count[$product_id],
                        'product' => $product[$product_id],
                        'weight' => $weight[$product_id],
                        'price' => $price[$product_id],
                        'gtip_code' => $gtip_code[$product_id],
                    ];

                    Product::create($productsS);
                }
            }

            if ($request->file_type) {
                $file_idS = array_keys($request->file_type);

                foreach ($file_idS as $key => $file_id) {
                    $document = $request->document[$file_id];
                    $file_name = $document->getClientOriginalName();
                    $file_type = $request->file_type[$file_id];
                    $cargo_document = [
                        'doc_id' => $file_id,
                        'cargo_id' => $cargo_id,
                        'document' => $file_name,
                        'type' => $file_type,
                    ];
                    Cargo_document::create($cargo_document);
                }
            }
            $cargo_requests = Cargo_request::all();
            $amazon_orders = Amazon_order::all();
            return view('userpanel.frontend.cargo_requests')->with([
                'message' => 'Amazon order successfully sent',
                'cargo_requests' => $cargo_requests,
                'amazon_orders' => $amazon_orders,
            ]);
        } else {
            return Redirect::back()->with('error', 'Invalid arguments');
        }
    }

    public function generatePdfAmazonOrder($id)
    {
        $order = DB::table('amazon_orders')
            ->where('id', $id)
            ->get()
            ->first();
        $company = DB::table('cargo_companies')
            ->where('id', $order->cargo_company)
            ->get()
            ->first();

        return view('userpanel.frontend.cargo_pdf')->with([
            'cargo_id' => $order->id,
            'name' => $order->name,
            'country' => $order->country,
            'city' => $order->city,
            'state' => $order->state,
            'address' => $order->address,
            'company' => $company->name,
            'order_info' => $order->order_info,
            'phone' => $order->phone,
            'date' => $order->created_at,
            'tracking_number' => $order->tracking_number,
            'user_id' => $order->user_id,
        ]);
    }

    public function bulk_order()
    {
        return view('userpanel.order.bulk_order');
    }

    public function create_bulk_order(Request $request)
    {
        // dd($request->all());

        $excel = SimpleXLSX::parse($request->order_file);

        for ($i = 1; $i < count($excel->rows()); $i++) {
            $cargo_id = random_int(10000000, 99999999);
            $cargo_id = 'BL' . $cargo_id;
            $package_id = random_int(10000000, 99999999);
            // $barcode = "data:image/png;base64,".DNS1D::getBarcodePNG($package_id, 'C39+');
            $packages[] = $package_id;
            $total_volume =
                ($excel->rows()[$i][18] *
                    $excel->rows()[$i][19] *
                    $excel->rows()[$i][20]) /
                5000;

            $data = new stdClass();
            $data->country = $excel->rows()[$i][1];
            $data->total_deci = max(
                $total_volume / 5000,
                $excel->rows()[$i][20]
            );
            $data->total_box_count = $excel->rows()[$i][16];
            $data->total_product_count = $excel->rows()[$i][23];
            $data->total_weight = $excel->rows()[$i][20];
            $data->total_volume = $total_volume;
            $data->total_worth =
                $excel->rows()[$i][16] *
                $excel->rows()[$i][23] *
                $excel->rows()[$i][25];

            $additional_services = json_encode(
                $this->service_calculation($data),
                true
            );
            $company_values = json_encode(
                $this->company_calculation($data),
                true
            );

            $company = $this->company_calculation($data);
            $companies = CargoCompany::all();
            foreach ($companies as $cmpn) {
                if (isset($company[$cmpn->id])) {
                    $cargo_company = $cmpn->id;
                }
            }

            $order_request = [
                'id' => $cargo_id,
                'order_type' => 'Bulk Order',
                'user_id' => Auth::user()->id,
                'name' => $excel->rows()[$i][0],
                'country' => $excel->rows()[$i][1],
                'city' => $excel->rows()[$i][2],
                'state' => $excel->rows()[$i][3],
                'address' => $excel->rows()[$i][4],
                'zipcode' => $excel->rows()[$i][5],
                'phone' => $excel->rows()[$i][6],
                'email' => $excel->rows()[$i][7],
                'ioss_number' => $excel->rows()[$i][8],
                'vat_number' => $excel->rows()[$i][9],
                'currency' => $excel->rows()[$i][10],
                'order_info' => $excel->rows()[$i][11],
                'packages' => json_encode($packages),
                'total_cargo_price' => 0,
                'total_weight' => $excel->rows()[$i][20],
                'total_volume' => $total_volume,
                'total_deci' => max(
                    $total_volume / 5000,
                    $excel->rows()[$i][20]
                ),
                'total_count' =>
                    $excel->rows()[$i][16] * $excel->rows()[$i][23],
                'total_worth' =>
                    $excel->rows()[$i][16] *
                    $excel->rows()[$i][23] *
                    $excel->rows()[$i][25],
                'cargo_company' => $cargo_company,
                'company_value' => $company_values,
                'additional_services' => $additional_services,
                'battery' => $excel->rows()[$i][12],
                'liquid' => $excel->rows()[$i][13],
                'food' => $excel->rows()[$i][14],
                'dangerous' => $excel->rows()[$i][15],
            ];
            Cargo_request::create($order_request);
            $packagesS = [
                'id' => $package_id,
                'cargo_id' => $cargo_id,
                'package_count' => $excel->rows()[$i][16],
                'package_type' => $excel->rows()[$i][17],
                'package_length' => $excel->rows()[$i][18],
                'package_width' => $excel->rows()[$i][19],
                'package_height' => $excel->rows()[$i][20],
                'package_weight' => $excel->rows()[$i][21],
                'barcode' => '',
            ];
            Package::create($packagesS);
            $productsS = [
                'cargo_id' => $cargo_id,
                'package_id' => $package_id,
                'sku_code' => $excel->rows()[$i][22],
                'count' => $excel->rows()[$i][23],
                'product' => $excel->rows()[$i][11],
                'weight' => $excel->rows()[$i][24],
                'price' => $excel->rows()[$i][25],
                'gtip_code' => $excel->rows()[$i][26],
            ];
            Product::create($productsS);
        }

        // dd($order_request , $packagesS , $productsS);

        return Redirect::back()->with(
            'message',
            'Bulk order successfully sent'
        );
    }

    public function company_calculation($data)
    {
        $deci = DB::table('cargo_zones')
            ->select('companyID', 'zone')
            ->where('desi', $data->total_deci)
            ->get();
        $zone = DB::table('cargo_countries')
            ->where('country', $data->country)
            ->get()
            ->first();

        $result_array = [];
        foreach ($deci as $deci) {
            $deci_zone_values = json_decode($deci->zone);
            $deci_company = $deci->companyID;
            if (isset($deci_zone_values[$zone->zone - 1])) {
                $deci_zone_value = $deci_zone_values[$zone->zone - 1];
            } else {
                $deci_zone_value = $deci_zone_values[0];
            }
            $company = DB::table('cargo_companies')
                ->where('id', $deci_company)
                ->get()
                ->first();

            $psh = ($deci_zone_value * $company->PSH) / 100;
            $jet = ($deci_zone_value * $company->jet_price) / 100;
            $emergency = ($deci_zone_value * $company->emergency) / 100;
            $kar_marj = ($deci_zone_value * $company->kar_marj) / 100;
            $deci_zone_value =
                $deci_zone_value + $psh + $jet + $emergency + $kar_marj;

            $result = [$deci->companyID => $deci_zone_value];
            $result_array += $result;
        }

        return $result_array;
    }

    public function service_calculation($data)
    {
        $services = DB::table('additional_services')->get();
        $services_array = [];

        foreach ($services as $service) {
            switch ($service->status) {
                case '1':
                    $price = $service->price * $data->total_deci;
                    $services_array += [$service->slug => $price];
                    break;
                case '2':
                    $price = $service->price * $data->total_box_count;
                    $services_array += [$service->slug => $price];
                    break;
                case '3':
                    $price = $service->price * $data->total_product_count;
                    $services_array += [$service->slug => $price];
                    break;
                case '4':
                    $price = $service->price * $data->total_weight;
                    $services_array += [$service->slug => $price];
                    break;
                case '5':
                    $price = $service->price * $data->total_volume;
                    $services_array += [$service->slug => $price];
                    break;
                case '6':
                    $price = $service->price * $data->total_worth;
                    $services_array += [$service->slug => $price];
                    break;
                default:
                    $price = $service->price;
                    $services_array += [$service->slug => $price];
                    break;
            }
        }
        return $services_array;
    }

    public function get_special_offer()
    {
        $countries = Country::all();

        return view(
            'userpanel.helpers.get_special_offer',
            compact('countries')
        );
    }

    public function post_special_offer(Request $request)
    {
        // dd($request->all());

        if ($request->hasfile('document')) {
            $file = $request->file('document');
            $document = $file->getClientOriginalName();
            $file->move(public_path() . '/special_offers/', $document);
        } else {
            $document = 'empty';
        }

        $details = [];
        if ($request->shipping_type == 'fcl') {
            foreach ($request->containeer_type as $key => $value) {
                $details[$key]['containeer_type'] = 'Type: '.$value;
            }
            foreach ($request->cargo_weight_containeer as $key => $value) {
                $details[$key]['cargo_weight_containeer'] = 'Cargo weight (per containeer): '.$value;
            }
            foreach ($request->quantity as $key => $value) {
                $details[$key]['quantity'] = 'Quantity: '.$value;
            }
        } else {
            foreach ($request->length as $key => $value) {
                $details[$key]['length'] = 'Length: '.$value;
            }
            foreach ($request->width as $key => $value) {
                $details[$key]['width'] = 'Width: '.$value;
            }
            foreach ($request->height as $key => $value) {
                $details[$key]['height'] = 'Height: '.$value;
            }
            foreach ($request->weight as $key => $value) {
                $details[$key]['weight'] = 'Weight: '.$value;
            }
            foreach ($request->quantity as $key => $value) {
                $details[$key]['quantity'] = 'Quantity: '.$value;
            }
        }

        // dd($details);

        $data = [
            'status' => '0',
            'user_id' => Auth::user()->id,
            'shipment_type' => $request->shipment_type,
            'cargo' => $request->cargo,
            'address' => $request->address,
            'date' => $request->date,
            'origin' => $request->origin,
            'destination' => $request->destination,
            'shipping_type' => $request->shipping_type,
            'additional' => $request->additional,
            'document' => $document,
            'insurance' => $request->insurance,
            'incoterm' => $request->incoterm,
            'details' => json_encode($details),
            'total_volume' => $request->total_volume,
            'total_weight' => $request->total_weight,
        ];

        // dd($data);

        SpecialOffer::create($data);

        return Redirect::back()->with('message', 'Offer succesfully created');
    }

    public function special_offers()
    {
        $special_offers = SpecialOffer::where(
            'user_id',
            Auth::user()->id
        )->get();

        return view(
            'userpanel.order.special_offers',
            compact('special_offers')
        );
    }

    public function faq()
    {
        $faqs = Faqs::all();
        $categories = FaqsCategory::all();

        return view('userpanel.faq.faq', compact('faqs', 'categories'));
    }
}

// $request->request->remove('_token');
// $data = collect(request()->all())->filter(function ($value) {
//     return null !== $value;
// })->toArray();

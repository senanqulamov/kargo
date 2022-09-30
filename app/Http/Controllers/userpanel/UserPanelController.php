<?php

namespace App\Http\Controllers\userpanel;

use App\Models\User as UserModel;
use App\Http\Controllers\Controller;
use App\Models\AdditionalService;
use App\Models\Amazon_order;
use App\Models\Cargo_document;
use App\Models\Cargo_request;
use App\Models\CargoCompany;
use App\Models\CargoZone;
use App\Models\Courier_request;
use App\Models\Forme_request;
use App\Models\MoneyBackRequest;
use App\Models\Order_time;
use App\Models\Package;
use App\Models\Payment;
use App\Models\PersonalCargo;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Str;
use Picqer\Barcode;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Spatie\Browsershot\Browsershot;
use Symfony\Component\Console\Input\Input;

class UserPanelController extends Controller
{
    public function index()
    {
        $user_addresses = DB::table('user_addresses')
            ->where('userID', Auth::user()->id)
            ->get();

        return view('userpanel.frontend.profile')->with(
            'user_addresses',
            $user_addresses
        );
    }

    public function updateuser(Request $request)
    {
        if ($request->email != Auth::user()->email) {
            $cloned_email = UserModel::where('email', $request->email)->first();
            if ($cloned_email) {
                return Redirect::back()->with(
                    'error',
                    'Unable to change email to existing one'
                );
            }
        }
        if ($request->phone != Auth::user()->phone) {
            $cloned_phone = UserModel::where('phone', $request->phone)->first();
            if ($cloned_phone) {
                return Redirect::back()->with(
                    'error',
                    'Unable to change phone to existing one'
                );
            }
        }
        $request->request->remove('_token');
        $update_data = collect(request()->all())
            ->filter(function ($value) {
                return null !== $value;
            })
            ->toArray();

        $password = Hash::make($request->password);
        if (!$request->password) {
            $update_data['password'] = Auth::user()->password;
        } else {
            $update_data['password'] = $password;
        }

        UserModel::where('id', Auth::user()->id)->update($update_data);

        return Redirect::back()->with(
            'message',
            'Profile successfully updated'
        );
    }

    public function getuseraddress(Request $request)
    {
        $address = UserAddress::where('id', $request->id)->first();

        return response()->json($address);
    }

    public function adduseraddress(Request $request)
    {
        $request->request->remove('_token');
        $data = collect(request()->all())
            ->filter(function ($value) {
                return null !== $value;
            })
            ->toArray();
        $data['userID'] = Auth::user()->id;

        UserAddress::create($data);

        return Redirect::back()->with(
            'message',
            'New address added succesfully'
        );
    }

    public function updateuseraddress(Request $request)
    {
        $request->request->remove('_token');
        $data = collect(request()->all())
            ->filter(function ($value) {
                return null !== $value;
            })
            ->toArray();

        UserAddress::where('id', $request->id)->update($data);

        return Redirect::back()->with(
            'message',
            'Address ' . $request->name . ' updated succesfully'
        );
    }

    public function deleteuseraddress($address_id)
    {
        DB::table('user_addresses')
            ->where('id', $address_id)
            ->delete();

        $msg = 'This address succesfully deleted';
        return response()->json(['msg' => $msg], 200);
    }

    public function updatemyprofile(Request $request)
    {
        $request->request->remove('_token');
        $keynput = collect(request()->all())
            ->filter(function ($value) {
                return null !== $value;
            })
            ->toArray();

        UserModel::where('id', Auth::user()->id)->update($keynput);

        if ($request->filled('address', 'city', 'country', 'postcode')) {
            UserModel::where('id', Auth::user()->id)->update(['status' => '1']);
        } else {
            UserModel::where('id', Auth::user()->id)->update(['status' => '0']);
        }

        return Redirect::back()->with(
            'message',
            'Profile successfully updated'
        );
    }

    public function mainmenu()
    {
        $countries = DB::table('countries')->get();
        $cargo_companies = DB::table('cargo_companies')->get();

        $cargo_requests = DB::table('cargo_requests')
            ->where('user_id', Auth::user()->id)
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');
        $pending = 0;
        $at_facility = 0;
        $on_the_way = 0;
        $total_cargo = count(
            DB::table('cargo_requests')
                ->where('user_id', Auth::user()->id)
                ->get()
        );

        if (isset($cargo_requests[0])) {
            $pending = $cargo_requests[0];
        }
        if (isset($cargo_requests[2])) {
            $at_facility = $cargo_requests[2];
        }
        if (isset($cargo_requests[4])) {
            $on_the_way = $cargo_requests[4];
        }

        $notifications = (new UserPanelHelper())->showNotifications();

        return view('userpanel.frontend.mainpage')->with([
            'countries' => $countries,
            'pending' => $pending,
            'at_facility' => $at_facility,
            'on_the_way' => $on_the_way,
            'total_cargo' => $total_cargo,
            'notifications' => $notifications,
            'cargo_companies' => $cargo_companies,
        ]);
    }

    public function loadChartsMainPage()
    {
        $date = Carbon::today()->subDays(30);
        $reqs = Cargo_request::where([
            ['user_id', Auth::user()->id],
            ['created_at', '>=', $date],
        ])
            ->select('status', 'created_at')
            ->orderBy('created_at', 'ASC')
            ->get();

        $grouped_by_days = collect($reqs)
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('d-M');
            })
            ->toArray();
        $status_days = [];
        foreach ($grouped_by_days as $key => $value) {
            array_push($status_days, $key);
        }
        $grouped_by_status = collect($reqs)
            ->groupBy('status')
            ->toArray();

        $status_chart_data = [];
        foreach ($grouped_by_status as $key => $value) {
            $days = [];
            foreach ($value as $value) {
                array_push(
                    $days,
                    Carbon::parse($value['created_at'])->format('d-M')
                );
            }
            $days = array_count_values($days);
            foreach ($status_days as $status_day) {
                if (!array_key_exists($status_day, $days)) {
                    $days[$status_day] = 0;
                }
            }
            ksort($days);
            //adding to result array
            $status = DB::table('package_statuses')
                ->where('status', $key)
                ->get()
                ->first();
            $status_chart_data[$status->status_name] = $days;
        }

        return response()->json(
            ['data' => $status_chart_data, 'days' => $status_days],
            200
        );
    }

    public function main_search(Request $request)
    {
        $cargo = Cargo_request::where('id', $request->search_index)
            ->get()
            ->first();
        $package = Package::where('id', $request->search_index)
            ->get()
            ->first();

        sleep(3);
        if ($cargo) {
            return response()->json($cargo->id, 200);
        } elseif ($package) {
            return response()->json($package->cargo_id, 200);
        }
    }

    public function GetSortedCargoOrders($status)
    {
        $cargos = Cargo_request::where([
            'user_id' => Auth::user()->id,
            'status' => $status,
        ])->get();

        $data = [];
        foreach ($cargos as $cargo) {
            $company = CargoCompany::where('id', $cargo->cargo_company)
                ->get()
                ->first();
            $cargo_row = [
                'id' => $cargo->id,
                'order_type' => $cargo->order_type ? $cargo->order_type : '---',
                'name' => $cargo->name ? $cargo->name : '---',
                'address' => $cargo->address ? $cargo->address : '---',
                'total_cargo_price' => $cargo->total_cargo_price
                    ? $cargo->total_cargo_price
                    : '---',
                'order_info' => $cargo->order_info ? $cargo->order_info : '---',
                'cargo_company' => $company->name ? $company->name : '---',
                'created_at' => Carbon::parse($cargo->created_at)->format(
                    'd-m-Y'
                ),
            ];
            array_push($data, $cargo_row);
        }
        sleep(1);

        return response()->json($data);
    }

    public function viewCargoDetails($id)
    {
        switch (substr($id, 0, 1)) {
            case 'A':
                $cargo = Amazon_order::where('id', $id)
                    ->get()
                    ->first();
                break;
            default:
                $cargo = Cargo_request::where('id', $id)
                    ->get()
                    ->first();
                break;
        }
        $packages = Package::where('cargo_id', $id)->get();
        $products = Product::where('cargo_id', $id)->get();
        $additional_services = AdditionalService::get();
        $currencies = DB::table('currencies')->get();

        return view('userpanel.frontend.cargo_details')->with([
            'cargo' => $cargo,
            'cargo_id' => $id,
            'packages' => $packages,
            'products' => $products,
            'additional_services' => $additional_services,
            'currencies' => $currencies,
        ]);
    }

    public function manualorder()
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

        return view('userpanel.frontend.manualorder')->with([
            'countries' => $countries,
            'user_addresses' => $user_addresses,
            'cargo_companies' => $cargo_companies,
            'additional_services' => $additional_services,
            'currencies' => $currencies,
        ]);
    }

    public function getquotemanualorder(Request $request)
    {
        // dd($request->all());

        $deci = DB::table('cargo_zones')
            ->select('companyID', 'zone')
            ->where([['desi', $request->total_deci], ['user_id', null]])
            ->get();
        $zone = DB::table('cargo_countries')
            ->where('country', $request->country)
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

        $services = DB::table('additional_services')->get();
        $services_array = [];

        foreach ($services as $service) {
            switch ($service->status) {
                case '1':
                    $price = $service->price * $request->total_deci;
                    $services_array += [$service->slug => $price];
                    break;
                case '2':
                    $price = $service->price * $request->total_box_count;
                    $services_array += [$service->slug => $price];
                    break;
                case '3':
                    $price = $service->price * $request->total_product_count;
                    $services_array += [$service->slug => $price];
                    break;
                case '4':
                    $price = $service->price * $request->total_weight;
                    $services_array += [$service->slug => $price];
                    break;
                case '5':
                    $price = $service->price * $request->total_volume;
                    $services_array += [$service->slug => $price];
                    break;
                case '6':
                    $price = $service->price * $request->total_worth;
                    $services_array += [$service->slug => $price];
                    break;
                default:
                    $price = $service->price;
                    $services_array += [$service->slug => $price];
                    break;
            }
        }

        $personal_deci = DB::table('cargo_zones')
            ->where([
                ['desi', $request->total_deci],
                ['user_id', Auth::user()->id],
            ])
            ->get();

        if ($personal_deci) {
            $personal_array = [];
            foreach ($personal_deci as $deci) {
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

                // $result = array($deci->companyID => $deci_zone_value);
                $company = CargoCompany::where('id', $deci->companyID)->first();
                $company_array = [
                    'id' => $deci->companyID,
                    'name' => $deci->personal_name,
                    'logo' => $company->logo,
                    'slug' => $company->slug,
                    'price' => $deci_zone_value,
                ];
                $personal_array[$company->name] = $company_array;
            }
        }

        return response()->json([
            'cargo_companies' => $result_array,
            'additional_services' => $services_array,
            'personal_array' => $personal_array,
        ]);
    }

    public function postManualorder(Request $request)
    {
        // $cargo_id = uniqid(15);
        $cargo_id = random_int(10000000, 99999999);
        $cargo_id = 'M' . $cargo_id;

        // dd($request->all());

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
                'order_type' => 'Manual Order',
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'country' => $request->country,
                'city' => $request->city,
                'state' => $request->state,
                'address' => $request->address,
                'zipcode' => $request->zipcode,
                'phone' => $request->phone,
                'email' => $request->email,
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
                'personal_cargo' => $request->personal_cargo,
                'selected_personal' => $request->selected_personal,
                'battery' => $request->battery,
                'liquid' => $request->liquid,
                'food' => $request->food,
                'dangerous' => $request->dangerous,
                'document' => json_encode($data),
            ];

            Cargo_request::create($order_request);

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

            if ($request->personal_cargo == 'true') {
                foreach ($request->personal_cargo_id as $key => $value) {
                    $personal_cargo = [
                        'user_id' => Auth::user()->id,
                        'company_id' => $value,
                        'order_id' => $cargo_id,
                        'name' => $request->personal_cargo_name[$value],
                        'value' => $request->personal_cargo_value[$value],
                    ];
                    PersonalCargo::create($personal_cargo);
                }
            }

            $cargo_requests = Cargo_request::all();
            $amazon_orders = Amazon_order::all();
            return view('userpanel.frontend.cargo_requests')->with([
                'message' => 'Cargo order successfully sent',
                'cargo_requests' => $cargo_requests,
                'amazon_orders' => $amazon_orders,
            ]);
        } else {
            return Redirect::back()->with('error', 'Invalid arguments');
        }
    }

    public function generatePdfManualOrder($id)
    {
        $order = DB::table('cargo_requests')
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

        // $data = [
        //     'cargo_id' => $order->id,
        //     'name' => $order->name,
        //     'country' => $order->country,
        //     'city' => $order->city,
        //     'state' => $order->state,
        //     'address' => $order->address,
        //     'company' => $company->name,
        //     'order_info' => $order->order_info,
        //     'phone' => $order->phone,
        //     'date' => $order->created_at,
        //     'tracking_number' => $order->tracking_number,
        //     'user_id' => $order->user_id
        // ];

        // $pdf = PDF::loadView('userpanel.frontend.cargo_pdf', $data)->setPaper('a5', 'landscape');
        // return $pdf->download('cargo_request.pdf');
    }

    public function cargorequests()
    {
        $cargo_requests = DB::table('cargo_requests')
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        $amazon_orders = DB::table('amazon_orders')
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        $packages = DB::table('packages')->get();

        return view('userpanel.frontend.cargo_requests')->with([
            'cargo_requests' => $cargo_requests,
            'amazon_orders' => $amazon_orders,
            'packages' => $packages,
        ]);
    }

    public function updatecargo(Request $request, $id)
    {
        // dd($request->all() , $id);

        switch (substr($id, 0, 1)) {
            case 'A':
                $data = [
                    'name' => $request->name,
                    'country' => $request->country,
                    'currency' => $request->currency,
                    'ioss_number' => $request->ioss_number,
                    'vat_number' => $request->vat_number,
                    'order_info' => $request->order_info,
                    'city' => $request->city,
                    'state' => $request->state,
                    'address' => $request->address,
                    'zipcode' => $request->zipcode,
                ];
                Amazon_order::where('id', $id)->update($data);
                break;
            default:
                $data = [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'address' => $request->address,
                    'zipcode' => $request->zipcode,
                    'currency' => $request->currency,
                    'ioss_number' => $request->ioss_number,
                    'vat_number' => $request->vat_number,
                    'order_info' => $request->order_info,
                ];
                Cargo_request::where('id', $id)->update($data);
                break;
        }

        foreach ($request->package_id as $key => $value) {
            $package = [
                'barcode' => $request->barcode[$value],
            ];
            Package::where('id', $value)->update($package);
        }

        switch (substr($id, 0, 1)) {
            case 'A':
                $action = 'Amazon order updated';
                break;
            default:
                $action = 'Cargo Request updated';
                break;
        }
        $time_data = [
            'cargo_id' => $id,
            'user_id' => Auth::user()->id,
            'action' => $action,
            'time' => Carbon::now(),
        ];

        Order_time::create($time_data);

        return Redirect::back()->with(
            'message',
            'Succesfully updated cargo details'
        );
    }

    public function balance()
    {
        $comissions = DB::table('comissions')->get();
        $payments = DB::table('payments')
            ->where('userID', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        // $kur = $this->getKur();
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();

        return view(
            'userpanel.frontend.balance',
            compact('payments', 'comissions', 'transactions')
        );
    }

    public function transactions()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        return view('userpanel.frontend.transactions', compact('transactions'));
    }

    public function getKur()
    {
        $xml = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');

        $index = 3;

        $name = $xml->Currency[$index]->CurrencyName;
        $buying = $xml->Currency[$index]->BanknoteBuying;
        $selling = $xml->Currency[$index]->BanknoteSelling;
        return response()->json($selling);
    }

    public function checkcomission(Request $request)
    {
        $comission = DB::table('comissions')
            ->where('payment', '=', $request->method)
            ->get()
            ->first();
        $comission = $comission->comission;

        $value = $request->balance - ($request->balance * $comission) / 100;
        // $value = $comission / 100;

        return response()->json(
            [
                'result_price' => $value,
                'comission' => $comission,
            ],
            200
        );
    }

    public function updateBalance(Request $request)
    {
        // dd($request->all());

        if ($request->document) {
            $file = $request->document;
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/files/payments/', $name);
        }
        $credentials = [
            'userID' => Auth::user()->id,
            'method' => $request->payment,
            'amount' => $request->balance,
            'comission' => $request->comission,
            'result_price' => $request->result_price,
            'kur' => $request->kur,
            'money_type' => $request->money_type,
            'payment_comment' => json_encode($request->payment_comment),
            'document' => $name,
        ];

        Payment::create($credentials);

        return Redirect::back()->with(
            'message',
            'Payment request succesfully uploaded. On acceptance of payment request with selling rate of '
                .$request->kur .' payment money will be '.$request->result_price
        );
    }

    public function updateUserBalanceInfo(Request $request)
    {
        $request->request->remove('_token');
        $keynput = collect(request()->all())
            ->filter(function ($value) {
                return null !== $value;
            })
            ->toArray();

        UserModel::where('id', Auth::user()->id)->update($keynput);

        return Redirect::back()->with('message', 'Iban changed succesfully');
    }

    public function postMoneyBackRequest(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'user' => $request->user_name,
            'Iban' => $request->Iban,
        ];

        MoneyBackRequest::create($data);

        return response()->json(['message' => 'Money Back request sent'], 200);
    }

    public function cargo_companies()
    {
        return view('userpanel.frontend.cargo_companies');
    }

    public function marketplace()
    {
        return view('userpanel.frontend.marketplace');
    }

    public function updateMarket(Request $request)
    {
        $data = [];
        $data['market_name'] = $request->market_name;
        $data['api_key'] = $request->api_key;
        $data['private_key'] = $request->private_key;

        $user = UserModel::find(Auth::user()->id);
        $user->integration = json_encode($data);
        $user->update();

        return Redirect::back()->with(
            'message',
            'market has been set to ' . $request->market_name . ' succesfully'
        );
    }

    public function courier_request()
    {
        $orders = Cargo_request::where([
            ['user_id', Auth::user()->id],
            ['status', 0],
        ])
            ->orderBy('created_at', 'DESC')
            ->get();
        $courier_requests = Courier_request::where(
            'user_id',
            Auth::user()->id
        )->get();
        return view(
            'userpanel.frontend.courier_request',
            compact('orders', 'courier_requests')
        );
    }

    public function post_courier_request(Request $request)
    {
        if (!$request->order_ids) {
            return Redirect::back()->with(
                'error',
                'Please select at least one Order'
            );
        }
        $data = [];

        $request->request->remove('_token');
        $data = collect(request()->all())
            ->filter(function ($value) {
                return null !== $value;
            })
            ->toArray();

        $data['orders'] = json_encode($request->order_ids);
        $data['user_id'] = Auth::user()->id;
        $data['status'] = 'pending';
        unset($data['order_ids']);

        Courier_request::create($data);

        return Redirect::back()->with(
            'message',
            'Courier Request applied succesfully'
        );
    }
}

// $request->request->remove('_token');
// $data = collect(request()->all())->filter(function ($value) {
//     return null !== $value;
// })->toArray();

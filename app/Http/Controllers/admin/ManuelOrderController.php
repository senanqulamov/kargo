<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Models\AdditionalService;
use App\Models\Amazon_order;
use Illuminate\Http\Request;
use App\Models\Cargo_document;
use App\Models\Cargo_request;
use App\Models\Courier_request;
use App\Models\Forme_request;
use App\Models\Order_time;
use App\Models\Package;
use App\Models\Product;
use App\Models\SpecialOffer;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use stdClass;

class ManuelOrderController extends Controller
{
    public function index()
    {
        return view('backend.manuel-order');
    }
    public function cargoRequests()
    {

        $cargo_requests = DB::table('cargo_requests')->orderBy('created_at', 'desc')->get();

        $packages = DB::table('packages')->get();

        return view('backend.cargo-requests')->with(
            [
                'cargo_requests' => $cargo_requests,
                'packages' => $packages
            ]
        );
    }

    public function amazonOrders()
    {

        $amazon_orders = Amazon_order::all();
        $packages = DB::table('packages')->get();

        return view('backend.orders.amazon_orders', compact('amazon_orders' ,'packages'));
    }

    public function packages()
    {
        $packages = DB::table('packages')->orderBy('created_at', 'desc')->get();

        return view('backend.cargo-packages')->with(
            [
                'packages' => $packages
            ]
        );
    }

    public function facilityscan()
    {

        return view('backend.facilityscan');
    }

    public function workerscan()
    {

        return view('backend.workerscan');
    }

    public function searchscan()
    {

        return view('backend.searchscan');
    }

    public function measurement()
    {

        return view('backend.measurement');
    }

    public function scannedcode(Request $request)
    {

        $package = Package::where('id', $request->package_id)->get()->first();
        $cargo = Cargo_request::where('id', $package->cargo_id)->get()->first();

        $data = [
            'status' => 2
        ];
        if ($cargo->status != 5) {
            Package::where('id', $request->package_id)->update($data);
        }
        $change_status = 0;


        $packages = Package::where('cargo_id', $package->cargo_id)->get();
        foreach ($packages as $package) {
            $change_status += $package->status;
        }
        $user = DB::table('users')->where('id', $cargo->user_id)->get()->first();

        if ($cargo->status != 5) {
            if ($change_status == 2 * count($packages)) {
                Cargo_request::where('id', $package->cargo_id)->update([
                    'status' => 2
                ]);
                $email_data = array(
                    'name' => $user->name,
                    'email' => $user->email,
                );

                Mail::send('backend.mails.cargoatfacility', $email_data, function ($message) use ($email_data) {
                    $message->to($email_data['email'], $email_data['name'])
                        ->subject('Cargo Notification')
                        ->from('noreply@shiplounge.co', 'ShipLounge');
                });
            } else {
                Cargo_request::where('id', $package->cargo_id)->update([
                    'status' => 0
                ]);
            }
        }

        $time_data = array(
            'cargo_id' => $cargo->id,
            'package_id' => $package->id,
            'user_id' => Auth::user()->id,
            'action' => 'Facility scan',
            'time' => Carbon::now()
        );

        Order_time::create($time_data);

        $package = Package::where('id', $request->package_id)->get()->first();
        $status = DB::table('package_statuses')->where('status', $package->status)->get()->first();

        return response()->json(array('package' => $package, 'cargo' => $cargo, 'status' => $status, 'user' => $user), 200);
    }

    public function workerscannedcode(Request $request)
    {

        $package = Package::where('id', $request->package_id)->get()->first();
        $cargo = Cargo_request::where('id', $package->cargo_id)->get()->first();

        $data = [
            'status' => 1
        ];
        Package::where('id', $request->package_id)->update($data);
        $change_status = 0;

        $packages = Package::where('cargo_id', $package->cargo_id)->get();
        foreach ($packages as $package) {
            $change_status += $package->status;
        }
        if ($change_status == 1 * count($packages)) {
            Cargo_request::where('id', $package->cargo_id)->update([
                'status' => 1
            ]);

            // Courier Request part
            $courier_request = Courier_request::whereJsonContains('orders', $package->cargo_id)->get();
            foreach ($courier_request as $courier_request) {
                $courier_change_status = 0;
                foreach (json_decode($courier_request->orders) as $order) {
                    $cargo_order_in_courier = Cargo_request::where('id', $order)->first();
                    if ($cargo_order_in_courier->status == 1) {
                        $courier_change_status += 1;
                    }
                }
                if ($courier_change_status == count(json_decode($courier_request->orders))) {
                    $courier_request->status = "done";
                    $courier_request->save();
                }
            }
        } else {
            Cargo_request::where('id', $package->cargo_id)->update([
                'status' => 0
            ]);
        }

        $time_data = array(
            'cargo_id' => $cargo->id,
            'package_id' => $package->id,
            'user_id' => Auth::user()->id,
            'action' => 'Worker scan',
            'time' => Carbon::now()
        );

        Order_time::create($time_data);

        $package = Package::where('id', $request->package_id)->get()->first();
        $status = DB::table('package_statuses')->where('status', $package->status)->get()->first();
        $user = DB::table('users')->where('id', $cargo->user_id)->get()->first();

        return response()->json(array('package' => $package, 'cargo' => $cargo, 'status' => $status, 'user' => $user), 200);
    }

    public function searchscannedcode(Request $request)
    {

        $package = Package::where('id', $request->package_id)->get()->first();
        $cargo = Cargo_request::where('id', $package->cargo_id)->get()->first();

        $status = DB::table('package_statuses')->where('status', $package->status)->get()->first();
        $user = DB::table('users')->where('id', $cargo->user_id)->get()->first();

        return response()->json(array('package' => $package, 'cargo' => $cargo, 'status' => $status, 'user' => $user), 200);
    }

    public function measurementUpdate(Request $request)
    {

        $data = array(
            'n_package_length' => $request->package_length,
            'n_package_width' => $request->package_width,
            'n_package_height' => $request->package_height,
            'n_package_weight' => $request->package_weight,
            'status' => 3
        );

        Package::where('id', $request->id)->update($data);

        $change_status = 0;
        $message = 'Succesfully updated';
        $package = Package::where('id', $request->id)->get()->first();
        $packages = Package::where('cargo_id', $package->cargo_id)->get();

        foreach ($packages as $package) {
            $change_status += $package->status;
        }
        if ($change_status == 3 * count($packages)) {
            Cargo_request::where('id', $package->cargo_id)->update([
                'status' => 3
            ]);
            $message = 'Succesfully updated. All packages from this order measured , order is ready to delivery';
            $is_reeady = 1;
        } else {
            Cargo_request::where('id', $package->cargo_id)->update([
                'status' => 0
            ]);
            $is_reeady = 0;
        }

        $result = (new HelperController)->calculator($package->cargo_id);

        // dd($result);

        $time_data = array(
            'cargo_id' => $result->cargo_id,
            'package_id' => $package->id,
            'user_id' => Auth::user()->id,
            'action' => 'Measurement scan',
            'time' => Carbon::now()
        );

        Order_time::create($time_data);

        return Redirect::back()->with([
            'message' => 'Package: ' . $request->id . ' ' . $message,
            'cargo_id' => $result->cargo_id,
            'is_ready' => $is_reeady
        ]);
    }

    public function cargo_details($id)
    {

        switch (substr($id, 0, 1)) {
            case 'A':
                $cargo = Amazon_order::where('id', $id)->get()->first();
                break;
            default :
                $cargo = Cargo_request::where('id', $id)->get()->first();
                break;
        }
        $packages = Package::where('cargo_id', $id)->get();
        $products = Product::where('cargo_id', $id)->get();
        $additional_services = AdditionalService::get();
        $currencies = DB::table('currencies')->get();

        return view('backend.cargo_details')->with([
            'cargo' => $cargo,
            'cargo_id' => $id,
            'packages' => $packages,
            'products' => $products,
            'additional_services' => $additional_services,
            'currencies' => $currencies
        ]);
    }

    public function submit_order($id)
    {
        $cargo = Cargo_request::where('id', $id)->get()->first();
        $total_cargo_price = $cargo->total_cargo_price;

        $user = User::where('id', $cargo->user_id)->get()->first();
        $new_user_balance = $user->balance - $total_cargo_price;
        User::where('id', $cargo->user_id)->update([
            'balance' => $new_user_balance
        ]);
        Cargo_request::where('id', $id)->update([
            'submitted' => 1
        ]);

        $data = new stdClass();
        $data->user_id = $user->id;
        $data->payment_id = null;
        $data->old_balance = $user->balance;
        $data->new_balance = $user->balance - $total_cargo_price;
        $data->transfer_method = "Order Charged after Measurement";

        (new HelperController)->checkTransaction($data);

        return Redirect::back()->with('message', 'Order Submited and balance of ' . $user->name . ' has been updated');
    }

    public function post_on_wait($id)
    {
        switch (substr($id, 0, 1)) {
            case 'A':
                Amazon_order::where('id', $id)->update([
                    'status' => 6
                ]);
                break;
            default :
                Cargo_request::where('id', $id)->update([
                    'status' => 6
                ]);
                break;
        }

        switch (substr($id, 0, 1)) {
            case 'A':
                $action = 'Amazon order paused';
                break;
            default :
                $action = 'Cargo Request paused';
                break;
        }
        $time_data = array(
            'cargo_id' => $id,
            'user_id' => Auth::user()->id,
            'action' => $action,
            'time' => Carbon::now()
        );
        Order_time::create($time_data);

        return Redirect::back()->with('message', 'Order Request is on wait');
    }

    public function remove_on_wait($id)
    {

        switch (substr($id, 0, 1)) {
            case 'A':
                Amazon_order::where('id', $id)->update([
                    'status' => 0
                ]);
                break;
            default :
                Cargo_request::where('id', $id)->update([
                    'status' => 0
                ]);
                break;
        }

        switch (substr($id, 0, 1)) {
            case 'A':
                $action = 'Amazon order pause removed';
                break;
            default :
                $action = 'Cargo Request pause removed';
                break;
        }
        $time_data = array(
            'cargo_id' => $id,
            'user_id' => Auth::user()->id,
            'action' => $action,
            'time' => Carbon::now()
        );
        Order_time::create($time_data);

        return Redirect::back()->with('message', 'Order Request is pending');
    }

    public function cancel_order(Request $request, $id)
    {

        switch (substr($id, 0, 1)) {
            case 'A':
                Amazon_order::where('id', $id)->update([
                    'cancel_comment' => $request->cancel_comment,
                    'status' => 5
                ]);
                $cargo = Amazon_order::where('id', $id)->get()->first();
                break;
            default :
                Cargo_request::where('id', $id)->update([
                    'cancel_comment' => $request->cancel_comment,
                    'status' => 5
                ]);
                $cargo = Cargo_request::where('id', $id)->get()->first();
                break;
        }

        $total_cargo_price = $cargo->total_cargo_price;
        $user = User::where('id', $cargo->user_id)->get()->first();

        if ($cargo->submitted == 1) {
            $new_user_balance = $user->balance + $total_cargo_price;
            User::where('id', $cargo->user_id)->update([
                'balance' => $new_user_balance
            ]);

            $data = new stdClass();
            $data->user_id = $user->id;
            $data->payment_id = null;
            $data->old_balance = $user->balance;
            $data->new_balance = $user->balance + $total_cargo_price;
            switch (substr($id, 0, 1)) {
                case 'A':
                    $data->transfer_method = "Amazon order payment returned for cancel";
                    break;
                default :
                    $data->transfer_method = "Cargo payment returned for cancel";
                    break;
            }

            (new HelperController)->checkTransaction($data);
        }

        switch (substr($id, 0, 1)) {
            case 'A':
                $action = 'Amazon order cancelled';
                break;
            default :
                $action = 'Cargo Request cancelled';
                break;
        }
        $time_data = array(
            'cargo_id' => $id,
            'user_id' => Auth::user()->id,
            'action' => $action,
            'time' => Carbon::now()
        );
        Order_time::create($time_data);

        return Redirect::back()->with('message', 'Order Cancelled of ' . $user->name . ' has been updated');
    }

    public function revert_order($id)
    {
        switch (substr($id, 0, 1)) {
            case 'A':
                $cargo = Amazon_order::where('id', $id)->get()->first();
                break;
            default :
                $cargo = Cargo_request::where('id', $id)->get()->first();
                break;
        }
        $total_cargo_price = $cargo->total_cargo_price;

        $user = User::where('id', $cargo->user_id)->get()->first();

        if ($cargo->submitted == 1) {
            $new_user_balance = $user->balance - $total_cargo_price;
            User::where('id', $cargo->user_id)->update([
                'balance' => $new_user_balance
            ]);

            $data = new stdClass();
            $data->user_id = $user->id;
            $data->payment_id = null;
            $data->old_balance = $user->balance;
            $data->new_balance = $user->balance - $total_cargo_price;
            switch (substr($id, 0, 1)) {
                case 'A':
                    $data->transfer_method = "Amazon order charged after revert";
                    break;
                default :
                    $data->transfer_method = "Cargo payment charged after revert";
                    break;
            }

            (new HelperController)->checkTransaction($data);
        }

        switch (substr($id, 0, 1)) {
            case 'A':
                Amazon_order::where('id', $id)->update([
                    'status' => 0
                ]);
                break;
            default :
                Cargo_request::where('id', $id)->update([
                    'status' => 0
                ]);
                break;
        }

        switch (substr($id, 0, 1)) {
            case 'A':
                $action = 'Amazon order reverted';
                break;
            default :
                $action = 'Cargo Request reverted';
                break;
        }
        $time_data = array(
            'cargo_id' => $id,
            'user_id' => Auth::user()->id,
            'action' => $action,
            'time' => Carbon::now()
        );
        Order_time::create($time_data);

        return Redirect::back()->with('message', 'Order Reverted and balance of ' . $user->name . ' has been updated');
    }

    public function cargo_update(Request $request, $id)
    {

        // dd($request->all() , $id);

        if ($request->package_id) {
            foreach ($request->package_id as $package_id) {
                $packages[] = $package_id;
            }
        }
        $packages = array_unique($packages);

        if ($request->document) {
            foreach ($request->document as $document) {
                $data[] = $document;
            }
            $data = array_unique($data);
        }else{
            $data = [];
        }

        $result = (new HelperController)->calculator($id);
        $additional_services = [];

        if ($request->additional_services) {
            foreach ($request->additional_services as $req_additional => $req_add_value) {
                foreach ($result->services as $service_key => $service_value) {
                    if ($service_key == $req_additional) {
                        $additional_services[$service_key] = $service_value;
                    }
                }
            }
        }
        $additional_services = json_encode($additional_services, true);
        $cargo_companies = json_encode($result->companies);

        switch (substr($id, 0, 1)) {
            case 'A':
                $order_request = array(
                    'id' => $id,
                    'ioss_number' => $request->ioss_number,
                    'vat_number' => $request->vat_number,
                    'currency' => $request->currency,
                    'order_info' => $request->order_info,
                    'country' => $request->country,
                    'tracking_number' => $request->tracking_number,
                    'total_cargo_price' => $request->total_cargo_price,
                    'cargo_company' => $request->cargo_company,
                    'company_value' => $cargo_companies,
                    // 'selected_personal' => $request->selected_personal,
                    'additional_services' => $additional_services,
                    'battery' => $request->battery,
                    'liquid' => $request->liquid,
                    'food' => $request->food,
                    'dangerous' => $request->dangerous,
                    'document' => json_encode($data)
                );
                Amazon_order::where('id', $id)->update($order_request);
                break;
            default :
                $order_request = array(
                    'id' => $id,
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
                    'currency' => $request->currency,
                    'order_info' => $request->order_info,
                    'tracking_number' => $request->tracking_number,
                    'total_cargo_price' => $request->total_cargo_price,
                    'cargo_company' => $request->cargo_company,
                    'company_value' => $cargo_companies,
                    'selected_personal' => $request->selected_personal,
                    'additional_services' => $additional_services,
                    'battery' => $request->battery,
                    'liquid' => $request->liquid,
                    'food' => $request->food,
                    'dangerous' => $request->dangerous,
                    'document' => json_encode($data)
                );
                Cargo_request::where('id', $id)->update($order_request);
                break;
        }

        foreach ($request->package_id as $key => $value) {
            $packagesS = array(
                'id' => $value,
                'cargo_id' => $id,
                'package_count' => $request->package_count[$value],
                'package_type' => $request->package_type[$value],
                'package_length' => $request->package_length[$value],
                'package_width' => $request->package_width[$value],
                'package_height' => $request->package_height[$value],
                'package_weight' => $request->package_weight[$value],
                'barcode' => $request->barcode[$value]
            );
            Package::where('id', $value)->update($packagesS);
        }

        $result = (new HelperController)->calculator($id);

        switch (substr($id, 0, 1)) {
            case 'A':
                $cargo = Amazon_order::where('id', $id)->get()->first();
                break;
            default :
                $cargo = Cargo_request::where('id', $id)->get()->first();
                break;
        }
        $total_cargo_price = (new HelperController)->calculateTotalCargoPrice($result);
        if ($cargo->total_cargo_price != $total_cargo_price) {
            switch (substr($id, 0, 1)) {
                case 'A':
                    Amazon_order::where('id', $id)->update([
                        'total_cargo_price' => $total_cargo_price
                    ]);
                    break;
                default :
                    Cargo_request::where('id', $id)->update([
                        'total_cargo_price' => $total_cargo_price
                    ]);
                    break;
            }
        }

        switch (substr($id, 0, 1)) {
            case 'A':
                $action = 'Amazon order updated';
                break;
            default :
                $action = 'Cargo Request updated';
                break;
        }
        $time_data = array(
            'cargo_id' => $id,
            'user_id' => Auth::user()->id,
            'action' => $action,
            'time' => Carbon::now()
        );
        Order_time::create($time_data);

        return Redirect::back()->with('message', 'Order ' . $id . ' , Succesfully updated');
    }

    public function cargo_logs()
    {
        $logs = Order_time::orderBy('id', 'DESC')->get();

        return view('backend.logs.cargo_logs')->with('logs', $logs);
    }

    public function cargo_logs_with_id($id)
    {
        $logs = Order_time::where('cargo_id', $id)->orderBy('id', 'DESC')->get();

        return view('backend.logs.cargo_logs')->with('logs', $logs);
    }

    public function buyforme()
    {

        $orders = Forme_request::all();

        return view('backend.orders.buyforme', compact('orders'));
    }

    public function custom_order_details($id)
    {

        $cargo = Forme_request::where('id', $id)->get()->first();

        return view('backend.orders.custom_order_details')->with([
            'cargo' => $cargo
        ]);
    }

    public function order_update(Request $request, $id)
    {

        $request->request->remove('_token');
        $data = collect(request()->all())->filter(function ($value) {
            return null !== $value;
        })->toArray();

        Forme_request::where('id', $id)->update($data);

        $time_data = array(
            'cargo_id' => $id,
            'user_id' => Auth::user()->id,
            'action' => 'Order updated',
            'time' => Carbon::now()
        );
        Order_time::create($time_data);

        return Redirect::back()->with('message', 'Order succesfully updated');
    }

    public function order_action(Request $request)
    {

        $id = $request->id;
        $request->request->remove('id');
        $data = collect(request()->all())->filter(function ($value) {
            return null !== $value;
        })->toArray();

        Forme_request::where('id', $id)->update($data);

        if ($request->status == 'cancelled') {
            $message = 'Order cancelled';
        } else if ($request->status == 'accepted') {
            $message = 'Order accepted';
        }

        $order = Forme_request::where('id', $id)->first();
        $user = User::where('id', $order->user_id)->first();
        $email_data = array(
            'name' => $user->name,
            'email' => $user->email,
            'mod_text' => $request->comment,
            'status' => $request->status
        );
        Mail::send('backend.mails.ordermail', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['name'])
                ->subject('ShipLounge , Order notification')
                ->from('noreply@shiplounge.co', 'ShipLounge');
        });

        return response()->json($message);
    }

    public function special_offers(){
        $special_offers = SpecialOffer::all();

        return view('backend.orders.special_offers', compact('special_offers'));
    }

    public function give_offer(Request $request , $id){

        $data = array(
            'offer_price' => $request->offer_price,
            'comment' => $request->comment
        );

        SpecialOffer::where('id' , $id)->update($data);

        return Redirect::back()->with('message' , 'Offer price succesfully sent');
    }
}

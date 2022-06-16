<?php

namespace App\Http\Controllers\userpanel;

use App\Models\User as UserModel;
use App\Http\Controllers\Controller;
use App\Models\Cargo_document;
use App\Models\Cargo_request;
use App\Models\Package;
use App\Models\Product;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Str;
use Picqer\Barcode;
use Picqer\Barcode\BarcodeGeneratorPNG;

class UserPanelController extends Controller
{
    public function index()
    {

        $user_addresses = DB::table('user_addresses')->where('userID', Auth::user()->id)->get();

        return view('userpanel.frontend.profile')->with('user_addresses', $user_addresses);
    }

    public function updateuser(Request $request)
    {

        $password = Hash::make($request->password);
        if (!$request->password) {
            $password = Auth::user()->password;
        }

        $update_data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $password
        );

        UserModel::where('id', Auth::user()->id)->update($update_data);

        return Redirect::back()->with('message', 'Profile successfully updated');
    }

    public function updateuseraddress(Request $request)
    {

        DB::table('user_addresses')->where('id', $request->id)->update($request->all());

        $msg = "This address succesfully updated";
        return response()->json(array('msg' => $msg), 200);
    }

    public function deleteuseraddress($address_id)
    {

        DB::table('user_addresses')->where('id', $address_id)->delete();

        $msg = "This address succesfully deleted";
        return response()->json(array('msg' => $msg), 200);
    }

    public function updatemyprofile(Request $request)
    {

        $request->request->remove('_token');
        $keynput = collect(request()->all())->filter(function ($value) {
            return null !== $value;
        })->toArray();

        UserModel::where('id', Auth::user()->id)->update($keynput);

        if ($request->filled('address', 'city', 'country', 'postcode')) {
            UserModel::where('id', Auth::user()->id)->update(array('status' => '1'));
        } else {
            UserModel::where('id', Auth::user()->id)->update(array('status' => '0'));
        }

        return Redirect::back()->with('message', 'Profile successfully updated');
    }


    public function manualorder()
    {

        $countries = DB::table('countries')->select('name', 'code', 'id')->get();
        $cargo_companies = DB::table('cargo_companies')->get();
        $user_addresses = DB::table('user_addresses')->where('userID', Auth::user()->id)->get();

        return view('userpanel.frontend.manualorder')->with([
            'countries' => $countries,
            'user_addresses' => $user_addresses,
            'cargo_companies' => $cargo_companies
        ]);
    }

    public function getquotemanualorder(Request $request)
    {
        // dd($request->all());

        $deci = DB::table('cargo_zones')->select('companyID', 'zone')->where('desi', $request->total_deci)->get();
        $zone = DB::table('cargo_countries')->where('country', $request->country)->get()->first();

        $result_array = array();
        foreach ($deci as $deci) {
            $deci_zone_values =  json_decode($deci->zone);
            $deci_company = $deci->companyID;
            $deci_zone_value = $deci_zone_values[$zone->zone - 1];
            $company = DB::table('cargo_companies')->where('id', $deci_company)->get()->first();

            $psh = ($deci_zone_value * $company->PSH) / 100;
            $jet = ($deci_zone_value * $company->jet_price) / 100;
            $emergency = ($deci_zone_value * $company->emergency) / 100;
            $kar_marj = ($deci_zone_value * $company->kar_marj) / 100;
            $deci_zone_value = $deci_zone_value + $psh + $jet + $emergency + $kar_marj;

            $result = array($deci->companyID => $deci_zone_value);
            $result_array += $result;
        }

        // dd($result_array);
        return response()->json($result_array, 200);
    }

    public function postManualorder(Request $request)
    {

        $cargo_id = uniqid(15);

        // dd($request->all());

        if ($request->package_id) {
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
            }

            $order_request = array(
                'id' => $cargo_id,
                'user_id' => Auth::user()->id,
                // 'customer' => $request->customer,
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
                'cargo_company'=> $request->cargo_company,
                'insure_order' => $request->insure_order,
                'extra_bubble' => $request->extra_bubble,
                'other_additional' => $request->other_additional,
                'battery' => $request->battery,
                'liquid' => $request->liquid,
                'food' => $request->food,
                'dangerous' => $request->dangerous,
                'document' => json_encode($data)
            );

            Cargo_request::create($order_request);

            foreach ($request->package_id as $key => $value) {

                $packagesS = array(
                    'id' => $value,
                    'cargo_id' => $cargo_id,
                    'package_count' => $request->package_count[$value],
                    'package_type' => $request->package_type[$value],
                    'package_length' => $request->package_length[$value],
                    'package_width' => $request->package_width[$value],
                    'package_height' => $request->package_height[$value],
                    'package_weight' => $request->package_weight[$value],
                    'barcode' => $request->barcode[$value]
                );
                Package::create($packagesS);
            }

            foreach ($request->package_id as $key => $package_id) {
                $sku_code = collect($request->sku_code[$package_id]);
                $count = collect($request->count[$package_id]);
                $product = collect($request->product[$package_id]);
                $weight = collect($request->weight[$package_id]);
                $price = collect($request->price[$package_id]);
                $gtip_code = collect($request->gtip_code[$package_id]);

                foreach ($request->product_id[$package_id] as $key => $product_id) {
                    $productsS = array(
                        'cargo_id' => $cargo_id,
                        'package_id' => $package_id,
                        'sku_code' => $sku_code[$product_id],
                        'count' => $count[$product_id],
                        'product' => $product[$product_id],
                        'weight' => $weight[$product_id],
                        'price' => $price[$product_id],
                        'gtip_code' => $gtip_code[$product_id]
                    );

                    Product::create($productsS);
                }
            }

            if ($request->file_type) {
                $file_idS = array_keys($request->file_type);

                foreach ($file_idS as $key => $file_id) {
                    $document = $request->document[$file_id];
                    $file_name = $document->getClientOriginalName();
                    $file_type = $request->file_type[$file_id];
                    $cargo_document = array(
                        'doc_id' => $file_id,
                        'cargo_id' => $cargo_id,
                        'document' => $file_name,
                        'type' => $file_type
                    );
                    Cargo_document::create($cargo_document);
                }
            }

            if ($request->save_address && $request->country) {
                $new_user_address = array(
                    'name' => $request->name,
                    'city' => $request->city,
                    'country' => $request->country,
                    'state' => $request->state,
                    'address' => $request->address,
                    'zipcode' => $request->zipcode,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'userID' => Auth::user()->id,
                );
                UserAddress::create($new_user_address);
            }

            return Redirect::back()->with('message', 'Cargo order successfully sent');
        } else {
            return Redirect::back()->with('error', 'Invalid arguments');
        }
    }

    public function cargorequests()
    {
        $cargo_requests = DB::table('cargo_requests')
        ->where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'DESC')
        ->get();

        $packages = DB::table('packages')->get();

        return view('userpanel.frontend.cargo_requests')
            ->with(
                [
                    'cargo_requests' => $cargo_requests,
                    'packages' => $packages
                ]
            );
    }

    public function editcargorequest($cargo_request_id){

        $cargo_request = DB::table('cargo_requests')->where('id' , $cargo_request_id)->get()->first();

        return view('userpanel.frontend.edit_cargo_request')
        ->with('cargo' , $cargo_request);
    }

    public function updatecargo(Request $request){

        $cargo_id = $request->cargo_id;

        $request->request->remove('_token');
        $request->request->remove('cargo_id');
        $data = collect(request()->all())->filter(function ($value) {
            return null !== $value;
        })->toArray();

        Cargo_request::where('id', $cargo_id)->update($data);

        return Redirect::back()->with('message' , 'Succesfully updated cargo details');
    }

    public function balance(){

        return view('userpanel.frontend.balance');
    }
}

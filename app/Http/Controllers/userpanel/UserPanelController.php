<?php

namespace App\Http\Controllers\userpanel;

use App\Models\User as UserModel;
use App\Http\Controllers\Controller;
use App\Models\Cargo_request;
use App\Models\Package;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Str;

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
        $user_addresses = DB::table('user_addresses')->where('userID' , Auth::user()->id)->get();

        return view('userpanel.frontend.manualorder')->with(['countries' => $countries , 'user_addresses'=>$user_addresses]);
    }

    public function postManualorder(Request $request)
    {

        $cargo_id = uniqid(15);

        // dd($request->all());

        if ($request->hasfile('document')) {

            foreach ($request->file('document') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/files/', $name);
                $data[] = $name;
            }
            $data = array_unique($data);
        }

        if($request->package_id){
            foreach ($request->package_id as $package_id) {
                $packages[] = $package_id;
            }
            $packages = array_unique($packages);

            $order_request = array(
                'id' => $cargo_id,
                // 'customer' => $request->customer,
                'fullname' => $request->name,
                'country' => $request->country,
                'state' => $request->state,
                'address' => $request->address,
                'zipcode' => $request->zipcode,
                'phone' => $request->phone,
                'email' => $request->email,
                'ioss_number' => $request->ioss_number,
                'vat_number' => $request->vat_number,
                'currency' => $request->currency_unit,
                'order_info' => $request->order_info,
                'packages'=> json_encode($packages),
                // 'cargo_company'=> $request->cargo_company,
                // 'additional'=> $request->customer,
                'battery' => $request->battery,
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
                    'package_weight' => $request->package_weight[$value]
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
            return Redirect::back()->with('message' , 'Cargo order successfully sent');
        }else{
            return Redirect::back()->with('error' , 'Invalid arguments');
        }

    }
}

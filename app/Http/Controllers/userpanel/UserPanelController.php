<?php

namespace App\Http\Controllers\userpanel;

use App\Models\User as UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

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

    public function updateuseraddress(Request $request){

        DB::table('user_addresses')->where('id' , $request->id)->update($request->all());

        $msg = "This address succesfully updated";
        return response()->json(array('msg' => $msg), 200);
    }

    public function deleteuseraddress($address_id)
    {

        DB::table('user_addresses')->where('id', $address_id)->delete();

        $msg = "This address succesfully deleted";
        return response()->json(array('msg' => $msg), 200);
    }

    public function updatemyprofile(Request $request){

        $request->request->remove('_token');
        $input = collect(request()->all())->filter(function($value) {
            return null !== $value;
        })->toArray();

        UserModel::where('id', Auth::user()->id)->update($input);

        if($request->filled('address' , 'city' , 'country' , 'postcode')){
            UserModel::where('id', Auth::user()->id)->update(array('status' => '1'));
        }else{
            UserModel::where('id', Auth::user()->id)->update(array('status' => '0'));
        }

        return Redirect::back()->with('message', 'Profile successfully updated');
    }


    public function manualorder(){

        $countries = DB::table('countries')->select('name' , 'code' , 'id')->get();

        // dd($countries);

        return view('userpanel.frontend.manualorder')->with('countries' , $countries);
    }

    public function postManualorder(Request $request){
        dd($request->all());


    }
}

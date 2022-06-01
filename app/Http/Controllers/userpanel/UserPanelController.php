<?php

namespace App\Http\Controllers\userpanel;

use App\Models\User as UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserPanelController extends Controller
{
    public function index(){

        return view('userpanel.frontend.profile');
    }

    public function updateuser(Request $request){

        $password = Hash::make($request->password);
        if(!$request->password){
            $password = Auth::user()->password;
        }

        $update_data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $password
        );

        UserModel::where('id' , Auth::user()->id)->update($update_data);

        return Redirect::back()->with('message' , 'Profile successfully updated');
    }
}

<?php

namespace App\Http\Controllers\front;

use App\Models\User as UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAuth extends Controller
{

    public function create(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'password' => 'required'
        ]);

        $password = Hash::make($request->password);

        $credentials = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $password
        );
        $user = UserModel::create($credentials);

        return redirect()->route('marketplace');

    }

    public function login(Request $request){

        $rules = array(
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        );

        $validator = Validator::make($request->all() , $rules);

        if($validator->fails()){
            $error = "Something happened";
            return redirect()->back()->withErrors($error)
            ->withInput($request->except('password'));
        }else{
            if(!UserModel::where('email' , $request->email)->first()){
                $error = "This email is not registered";
                return redirect()->back()->withErrors($error)
                ->withInput($request->except('password'));
            }
            $user = array(
                'email' => $request->email ,
                'password' => $request->password
            );

            if(Auth::attempt($user)){
                $username = UserModel::where('email' , $request->email)->first();
                $username = $username->name;
                return redirect()->route('userpanel.index')->with('log_in_message' , 'Logged in as '.$username.' !');
            }else{
                $error = "Wrong password";
                return redirect()->back()->withErrors($error)
                ->withInput($request->except('password'));
            }
        }

    }

    public function logout(){

        Auth::logout();

        return redirect()->route('login')->with('message' , 'Logged out successfully');
    }
}

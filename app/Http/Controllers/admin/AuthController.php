<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as UserModel;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(){
        if(Auth::user() && Auth::user()->is_admin == "1"){
            $username = UserModel::where('email' , Auth::user()->email)->first();
            $username = $username->name;
            $message = 'Logged in as '.$username.' !';
            return redirect()->route('admin.dashboard')->with('log_in_message' , $message);
        }else{
            return view('backend.index');
        }
    }

    public function login(Request $request){

        $rules = array(
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        );

        $user = UserModel::where('email' , '=' , $request->email)->first();
        if($user->is_banned == 1){
            return redirect()->back()->withErrors('You are banned from website, please contact with moderator');
        }

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
                $message = 'Logged in as '.$username.' !';
                return redirect()->route('admin.dashboard')->with('log_in_message' , $message);
            }else{
                $error = "Wrong password";
                return redirect()->back()->withErrors($error)
                ->withInput($request->except('password'));
            }
        }

    }

    public function logout(){
		Auth::logout();

        return redirect()->route('admin.index')->with('message' , 'Logged out successfully');
    }
}

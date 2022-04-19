<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('backend.index');
    }

    public function postIndex(LoginRequest $request){   
		if( Auth::guard('employee')->attempt(['email'=>$request->email, 'password'=>$request->password]) ){
			return redirect()->route('admin.dashboard');
		}
		
    toastr()->error('Password or email is not entered correctly', 'Ooops!');
		return redirect()->route('admin.index');
    }

    public function logout(){
		Auth::guard('employee')->logout();
        return redirect()->route('admin.index');
    }
}

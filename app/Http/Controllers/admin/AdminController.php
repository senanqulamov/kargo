<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class AdminController extends Controller
{
    public function index(){
        return view('backend.dashboard');
    }

    public function profile(){

        return view('backend.profile');
    }

    public function updateprofile(Request $request){

        $request->request->remove('_token');
        $input = collect(request()->all())->filter(function($value) {
            return null !== $value;
        })->toArray();

        UserModel::where('id' , Auth::user()->id)->update($input);

        return Redirect::back()->with('message', 'Profile successfully updated');
    }

    public function updateimage(Request $request){

        $filename = time().'.'.request()->file('image')->getClientOriginalExtension();
        request()->image->move(public_path('images'), $filename);

        // dd($filename , $request->all());

        UserModel::where('id' , Auth::user()->id)->update(['image' => $filename]);

        return Redirect::back()->with('message', 'Profile Image successfully updated');
    }
}

<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\User as UserModel;

class HomeController extends Controller
{
    // index section
    public function index(){
        $countries=Country::orderBy('name','asc')->get();
        return view('frontend.index', compact('countries'));
    }

    public function ecommerce(){
        return view('frontend.e-commerce');
    }

    public function fba(){
        return view('frontend.fba');
    }

    public function marketplace(){
        return view('frontend.marketplace');
    }

    public function export(){
        return view('frontend.e-export');
    }

    public function servicesFee(){
        return view('frontend.services-fee');
    }

    public function getquote(){
        return view('frontend.getquote');
    }

    public function service(){
        return view('frontend.services-fee');
    }

    public function membershifee(){
        return view('frontend.membershifee');
    }

    public function track(){
        return view('frontend.track');
    }

    public function login(){
        return view('frontend.login');
    }

    public function register(){
        $users = UserModel::all();

        return view('frontend.register')->with('users' , $users);
    }
}

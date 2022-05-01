<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.index');
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

    public function pricecalculator(){
        return view('frontend.pricecalculator');
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
        return view('frontend.register');
    }
}

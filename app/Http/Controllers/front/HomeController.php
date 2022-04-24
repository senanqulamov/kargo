<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function faqs(){
        return view('frontend.faqs');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function inquiry(){
        return view('frontend.inquiry');
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

    public function servcice(){
        return view('frontend.servcice-fee');
    }

    public function membershifee(){
        return view('frontend.membershifee');
    }

    public function blog(){
        return view('frontend.blog');
    }

    public function track(){
        return view('frontend.track');
    }

    public function career(){
        return view('frontend.career');
    }

    public function login(){
        return view('frontend.login');
    }

    public function register(){
        return view('frontend.register');
    }
}

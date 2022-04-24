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
}

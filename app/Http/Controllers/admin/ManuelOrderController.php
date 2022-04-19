<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManuelOrderController extends Controller
{
    public function index(){
        return view('backend.manuel-order');
    }
}

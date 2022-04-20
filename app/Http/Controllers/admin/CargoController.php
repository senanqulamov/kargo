<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function company(){
        return view('backend.cargo-company');
    }

    public function domestic(){
        return view('backend.domestic-company');
    }
}

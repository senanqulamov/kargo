<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DomesticCompany;

class DomesticCompanyController extends Controller
{
    public function index(){
        $domestics=DomesticCompany::orderBy('created_at','desc')->get();
        return view('backend.domestic-company', compact('domestics'));
    }
}

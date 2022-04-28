<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CargoCompany;
use App\Models\UserAddress;
use App\Models\Country;

class ManuelOrderController extends Controller
{
    public function index(){
        $cargo_company=CargoCompany::orderBy('created_at','desc')->get();
        $address=UserAddress::where('userID', Auth::id())->orderBy('created_at','desc')->get();
		$countries=Country::orderBy('created_at','asc')->get();
        
        return response()->json([
            'status' => 1, 
            'cargo_company' => $cargo_company,
            'address' => $address,
			'countries' => $countries,
        ], 200);
    }
}

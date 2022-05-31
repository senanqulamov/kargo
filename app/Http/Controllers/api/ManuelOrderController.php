<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CargoCompany;
use App\Models\UserAddress;
use App\Models\Country;
use App\Models\AdditionalService;

use Illuminate\Support\Facades\Auth;

class ManuelOrderController extends Controller
{
    public function index(){
        $cargo_company=CargoCompany::orderBy('created_at','desc')->get();
        $address=UserAddress::where('userID', Auth::id())->orderBy('created_at','desc')->get();
		$countries=Country::orderBy('created_at','asc')->get();
        $service=AdditionalService::all();
        
        return response()->json([
            'status' => 1, 
            'cargo_company' => $cargo_company,
            'address' => $address,
            'service'=>$service,
			'countries' => $countries,
        ], 200);
    }
}

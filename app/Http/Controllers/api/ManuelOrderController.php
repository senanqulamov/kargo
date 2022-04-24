<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CargoCompany;

class ManuelOrderController extends Controller
{
    public function index(){
        $cargo_company=CargoCompany::orderBy('created_at','desc')->get();
        
        return response()->json([
            'status' => 1, 
            'cargo_company' => $cargo_company,
        ], 200);
    }
}

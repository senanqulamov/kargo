<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManuelOrderController extends Controller
{
    public function index(){
        return response()->json([
            'status' => 1, 
        ], 200);
    }
}

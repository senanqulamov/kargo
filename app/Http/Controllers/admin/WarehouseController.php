<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Warehouses;

class WarehouseController extends Controller
{
    public function index(){
        $warehouses=Warehouses::orderBy('created_at','desc')->get();
        return view('backend.warehouse', compact('warehouses'));
    }
}

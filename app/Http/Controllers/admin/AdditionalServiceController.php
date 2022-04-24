<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AdditionalService;

class AdditionalServiceController extends Controller
{
    public function index(){
        $services=AdditionalService::orderBy('created_at','desc')->get();
        return view('backend.additional-services', compact('services'));
    }
}

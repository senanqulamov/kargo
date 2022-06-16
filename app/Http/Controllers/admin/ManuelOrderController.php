<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cargo_document;
use App\Models\Cargo_request;
use App\Models\Package;
use App\Models\Product;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Str;

class ManuelOrderController extends Controller
{
    public function index()
    {
        return view('backend.manuel-order');
    }
    public function cargoRequests()
    {

        $cargo_requests = DB::table('cargo_requests')->get();
        $packages = DB::table('packages')->get();

        return view('backend.cargo-requests')->with(
            [
                'cargo_requests' => $cargo_requests,
                'packages' => $packages
            ]
        );
    }

    public function packages(){
        $packages = DB::table('packages')->get();

        return view('backend.cargo-packages')->with(
            [
                'packages' => $packages
            ]
        );
    }
}

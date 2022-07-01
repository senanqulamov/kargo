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

        $cargo_requests = DB::table('cargo_requests')->orderBy('created_at', 'desc')->get();

        // dd($cargo_requests);
        $packages = DB::table('packages')->get();

        return view('backend.cargo-requests')->with(
            [
                'cargo_requests' => $cargo_requests,
                'packages' => $packages
            ]
        );
    }

    public function packages()
    {
        $packages = DB::table('packages')->orderBy('created_at', 'desc')->get();

        return view('backend.cargo-packages')->with(
            [
                'packages' => $packages
            ]
        );
    }

    public function facilityscan()
    {

        return view('backend.facilityscan');
    }

    public function workerscan()
    {

        return view('backend.workerscan');
    }

    public function searchscan()
    {

        return view('backend.searchscan');
    }

    public function scannedcode(Request $request)
    {

        $package = Package::where('id', $request->package_id)->get()->first();
        $cargo = Cargo_request::where('id', $package->cargo_id)->get()->first();

        $data = [
            'status' => 2
        ];
        Package::where('id', $request->package_id)->update($data);
        $change_status = 0;


        $packages = Package::where('cargo_id', $package->cargo_id)->get();
        foreach ($packages as $package) {
            if ($package->status == 2) {
                $change_status = 1;
            } else {
                $change_status = 0;
            }
        }
        if ($change_status == 1) {
            Cargo_request::where('id', $package->cargo_id)->update([
                'status' => 2
            ]);
        } else {
            Cargo_request::where('id', $package->cargo_id)->update([
                'status' => 0
            ]);
        }

        $package = Package::where('id', $request->package_id)->get()->first();
        $status = DB::table('package_statuses')->where('status' , $package->status)->get()->first();

        return response()->json(array('package' => $package, 'cargo' => $cargo , 'status' => $status), 200);
    }

    public function workerscannedcode(Request $request)
    {

        $package = Package::where('id', $request->package_id)->get()->first();
        $cargo = Cargo_request::where('id', $package->cargo_id)->get()->first();

        $data = [
            'status' => 1
        ];
        Package::where('id', $request->package_id)->update($data);
        $change_status = 0;

        $packages = Package::where('cargo_id', $package->cargo_id)->get();
        foreach ($packages as $package) {
            if ($package->status == 1) {
                $change_status = 1;
            } else {
                $change_status = 0;
            }
        }
        if ($change_status == 1) {
            Cargo_request::where('id', $package->cargo_id)->update([
                'status' => 1
            ]);
        } else {
            Cargo_request::where('id', $package->cargo_id)->update([
                'status' => 0
            ]);
        }

        $package = Package::where('id', $request->package_id)->get()->first();
        $status = DB::table('package_statuses')->where('status' , $package->status)->get()->first();

        return response()->json(array('package' => $package, 'cargo' => $cargo , 'status' => $status), 200);
    }

    public function searchscannedcode(Request $request){

        $package = Package::where('id', $request->package_id)->get()->first();
        $cargo = Cargo_request::where('id', $package->cargo_id)->get()->first();

        $status = DB::table('package_statuses')->where('status' , $package->status)->get()->first();

        return response()->json(array('package' => $package, 'cargo' => $cargo , 'status' => $status), 200);
    }
}

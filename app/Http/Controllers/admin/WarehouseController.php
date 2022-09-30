<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Package;

use Validator;

class WarehouseController extends Controller
{
    public function index(){
        $packages=Package::orderBy('created_at','desc')->where('status', 1)->get();
        $page_title = "Warehouses";

        return view('backend.warehouse', compact('packages','page_title'));
    }

	public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'inputBarcode' => 'required|min:3|max:225'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $package=Package::where('barcode', $request->inputBarcode)->first();
            $package->status=1;
            $package->save();

            return response()->json(['status'=>1, 'msg'=>'Package was successfully registered', 'state'=>'Congratulations!']);
        }
    }

	public function edit(Request $request)
    {
        $package=Package::find($request->id);

        return response()->json([
            'status' => 200,
            'data' => $package,
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'inputWeight' => 'required|min:1|numeric',
            'inputHeight' => 'required|min:1|numeric',
            'inputWidth' => 'required|min:1|numeric',
            'inputLength' => 'required|min:1|numeric',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {

            $faqs_id=$request->input('hiddenID');

            $package=Package::find($faqs_id);
            $package->weight=$request->inputWeight;
            $package->height=$request->inputHeight;
            $package->width=$request->inputWidth;
            $package->length=$request->inputLength;
            $package->update();

            return response()->json(['status'=>1, 'msg'=>'Package has been successfully updated', 'state'=>'Congratulations!']);
        }
    }

	public function search(Request $request)
    {
        $package=Package::where('barcode', $request->id)->where('status', 0)->first();

        return response()->json([
            'status' => 200,
            'data' => $package,
        ]);
    }
}

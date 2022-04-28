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
	
	public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'inputName' => 'required|min:3|max:225',
            'inputCustomerCode' => 'required|min:3|max:225',
            'fileLogo' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:10000'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $warehouses=new Warehouses;
            $warehouses->name=$request->inputName;
            $warehouses->slug=Str::slug($request->inputName, '-');
            $warehouses->customer_code=$request->inputCustomerCode;

            if($request->hasFile('fileLogo')){
                $image = time().'.'.$request->fileLogo->extension();
                $request->fileLogo->move(public_path('backend/assets/img/companies/domestic'), $image);
                $warehouses->logo=$image;
            }
            
            $warehouses->save();

            return response()->json(['status'=>1, 'msg'=>'Warehouses company was successfully registered', 'state'=>'Congratulations!']);
        }         
    }
	
	public function edit(Request $request)
    {
        $warehouses=Warehouses::find($request->id);

        return response()->json([
            'status' => 200,
            'data' => $warehouses,
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'inputName2' => 'required|min:3|max:225',
            'inputCustomerCode2' => 'required|min:3|max:225',
            'fileLogo2' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:10000'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {

            $faqs_id=$request->input('hiddenID');

            $domestic=Warehouses::find($faqs_id);
            $domestic->name=$request->inputName2;
            $domestic->slug=Str::slug($request->inputName2, '-');

            if($request->hasFile('fileLogo2')){
                $image = time().'.'.$request->fileLogo2->extension();
                $request->fileLogo2->move(public_path('backend/assets/img/companies/cargo'), $image);
                $cargo->logo=$image;
            }
            
            $domestic->customer_code=$request->inputCustomerCode2;
            $domestic->update();

            return response()->json(['status'=>1, 'msg'=>'Domestic company has been successfully updated', 'state'=>'Congratulations!']);
        }         
    }

    public function delete($id){

        $image = Warehouses::findOrFail($id);
        $file= $image->image;

        $filename = public_path('backend/assets/img/companies/cargo').$file;
        if(file_exists($filename)){
            @unlink($filename);
        }     

        Warehouses::where('id', $id)->delete();
        toastr()->success('Domestic company was successfully deleted', 'Congratulations!');
        return redirect()->route('admin.companies.domestic');
    }
}

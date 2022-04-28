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
            $services=new AdditionalService;
            $services->name=$request->inputName;
            $services->slug=Str::slug($request->inputName, '-');
            $services->customer_code=$request->inputCustomerCode;

            if($request->hasFile('fileLogo')){
                $image = time().'.'.$request->fileLogo->extension();
                $request->fileLogo->move(public_path('backend/assets/img/companies/domestic'), $image);
                $services->logo=$image;
            }
            
            $services->save();

            return response()->json(['status'=>1, 'msg'=>'Services company was successfully registered', 'state'=>'Congratulations!']);
        }         
    }
	
	public function edit(Request $request)
    {
        $services=AdditionalService::find($request->id);

        return response()->json([
            'status' => 200,
            'data' => $services,
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

            $services=AdditionalService::find($faqs_id);
            $services->name=$request->inputName2;
            $services->slug=Str::slug($request->inputName2, '-');

            if($request->hasFile('fileLogo2')){
                $image = time().'.'.$request->fileLogo2->extension();
                $request->fileLogo2->move(public_path('backend/assets/img/companies/cargo'), $image);
                $cargo->logo=$image;
            }
            
            $services->customer_code=$request->inputCustomerCode2;
            $services->update();

            return response()->json(['status'=>1, 'msg'=>'Services company has been successfully updated', 'state'=>'Congratulations!']);
        }         
    }

    public function delete($id){

        $image = AdditionalService::findOrFail($id);
        $file= $image->image;

        $filename = public_path('backend/assets/img/companies/cargo').$file;
        if(file_exists($filename)){
            @unlink($filename);
        }     

        AdditionalService::where('id', $id)->delete();
        toastr()->success('Services company was successfully deleted', 'Congratulations!');
        return redirect()->route('admin.companies.services');
    }
}

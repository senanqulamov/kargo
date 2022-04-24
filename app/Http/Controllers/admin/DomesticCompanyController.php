<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DomesticCompany;
use Illuminate\Support\Str;

use Validator;
use File;

class DomesticCompanyController extends Controller
{
    public function index(){
        $domestics=DomesticCompany::orderBy('created_at','desc')->get();
        return view('backend.domestic-company', compact('domestics'));
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
            $domestic=new DomesticCompany;
            $domestic->name=$request->inputName;
            $domestic->slug=Str::slug($request->inputName, '-');
            $domestic->customer_code=$request->inputCustomerCode;

            if($request->hasFile('fileLogo')){
                $image = time().'.'.$request->fileLogo->extension();
                $request->fileLogo->move(public_path('backend/assets/img/companies/domestic'), $image);
                $domestic->logo=$image;
            }
            
            $domestic->save();

            return response()->json(['status'=>1, 'msg'=>'Domestic company was successfully registered', 'state'=>'Congratulations!']);
        }         
    }
	
	public function edit(Request $request)
    {
        $domestic=DomesticCompany::find($request->id);

        return response()->json([
            'status' => 200,
            'data' => $domestic,
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

            $domestic=DomesticCompany::find($faqs_id);
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

        $image = DomesticCompany::findOrFail($id);
        $file= $image->image;

        $filename = public_path('backend/assets/img/companies/cargo').$file;
        if(file_exists($filename)){
            @unlink($filename);
        }     

        DomesticCompany::where('id', $id)->delete();
        toastr()->success('Domestic company was successfully deleted', 'Congratulations!');
        return redirect()->route('admin.companies.domestic');
    }

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'fileExcel' => 'required|max:50000|mimes:xlsx',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $excel = time().'.'.$request->fileExcel->extension();
            $request->fileExcel->move(public_path('backend/document/cargo'), $excel);            

            return response()->json(['status'=>1, 'msg'=>'Cargo company  was successfully registered', 'state'=>'Congratulations!']);
        }         
    }
}

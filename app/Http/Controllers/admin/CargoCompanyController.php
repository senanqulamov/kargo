<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CargoCompany;
use Illuminate\Support\Str;

use File;

use Validator;

class CargoCompanyController extends Controller
{
    public function index(){
        $cargos=CargoCompany::orderBy('created_at','desc')->get();
        return view('backend.cargo-company', compact('cargos'));
    }	
	
	public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'inputName' => 'required|min:3|max:225',
            'inputApi' => 'required|min:3|max:225',
            'inputPrivate' => 'required|min:3|max:225',
            'fileLogo' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:10000'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $entegration=array();
            array_push($entegration, $request->inputApi);
            array_push($entegration, $request->inputPrivate);

            $cargo=new CargoCompany;
            $cargo->name=$request->inputName;
            $cargo->slug=Str::slug($request->inputName, '-');

            if($request->hasFile('fileLogo')){
                $image = time().'.'.$request->fileLogo->extension();
                $request->fileLogo->move(public_path('backend/assets/img/companies/cargo'), $image);
                $cargo->logo=$image;
            }
            
            $cargo->entegrations=json_encode($entegration);
            $cargo->save();

            return response()->json(['status'=>1, 'msg'=>'Cargo company  was successfully registered', 'state'=>'Congratulations!']);
        }         
    }
	
	public function edit(Request $request)
    {
        $cargo=CargoCompany::find($request->id);

        return response()->json([
            'status' => 200,
            'data' => $cargo,
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'inputName2' => 'required|min:3|max:225',
            'inputApi2' => 'required|min:3|max:225',
            'inputPrivate2' => 'required|min:3|max:225',
            'fileLogo2' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:10000'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {     
            $entegration=array();
            array_push($entegration, $request->inputApi2);
            array_push($entegration, $request->inputPrivate2);

            $faqs_id=$request->input('hiddenID');

            $cargo=CargoCompany::find($faqs_id);
            $cargo->name=$request->inputName2;
            $cargo->slug=Str::slug($request->inputName2, '-');

            if($request->hasFile('fileLogo2')){
                $image = time().'.'.$request->fileLogo2->extension();
                $request->fileLogo2->move(public_path('backend/assets/img/companies/cargo'), $image);
                $cargo->logo=$image;
            }
            
            $cargo->entegrations=json_encode($entegration);
            $cargo->update();

            return response()->json(['status'=>1, 'msg'=>'Cargo company has been successfully updated', 'state'=>'Congratulations!']);
        }         
    }

    public function delete($id){

        $image = CargoCompany::findOrFail($id);
        $file= $image->image;

        $filename = public_path('backend/assets/img/companies/cargo').$file;
        if(file_exists($filename)){
            @unlink($filename);
        }     

        CargoCompany::where('id', $id)->delete();
        toastr()->success('Cargo company was successfully deleted', 'Congratulations!');
        return redirect()->route('admin.companies.cargo');
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

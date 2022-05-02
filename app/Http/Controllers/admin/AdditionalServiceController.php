<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AdditionalService;

use Validator;
use Illuminate\Support\Str;

class AdditionalServiceController extends Controller
{
    public function index(){
        $services=AdditionalService::orderBy('created_at','desc')->get();
        return view('backend.additional-services', compact('services'));
    }
	
	public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'inputTitle' => 'required|min:3|max:225',
            'selectType' => 'required',
            'inputPrice' => 'required|max:1500|numeric'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $services=new AdditionalService;
            $services->title=$request->inputTitle;
            $services->slug=Str::slug($request->inputTitle, '-');
            $services->status=$request->selectType;
            $services->price=$request->inputPrice;
            
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
            'inputTitle2' => 'required|min:3|max:225',
            'selectType2' => 'required',
            'inputPrice2' => 'required|max:1500|numeric'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {

            $id=$request->input('hiddenID');

            $services=AdditionalService::find($id);
            $services->title=$request->inputTitle2;
            $services->slug=Str::slug($request->inputTitle2, '-');
            $services->status=$request->selectType2;
            $services->price=$request->inputPrice2;
            $services->update();

            return response()->json(['status'=>1, 'msg'=>'Services company has been successfully updated', 'state'=>'Congratulations!']);
        }         
    }

    public function delete($id){
        AdditionalService::where('id', $id)->delete();
        toastr()->success('Services company was successfully deleted', 'Congratulations!');
        return redirect()->route('admin.services.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Career;
use App\Models\Country;
use App\Models\CareerApply;

use Illuminate\Support\Str;

use Validator;

class CareerController extends Controller
{
    public function index(){
		$careers=Career::where('status', 1)->orderBy('created_at','desc')->get();
        return view('frontend.career', compact('careers'));
    }
	
	public function fetch(Request $request)
    {
        $career_details=Career::find($request->id);

        return response()->json([
            'data' => $career_details,
        ]);
    }
	
	public function apply($id){
		$career_detail=Career::find($id);
        return view('frontend.apply', compact('career_detail'));
    }
	
	public function postApply(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3|max:225',
            'surname' => 'required|min:3|max:225',
            'email' => 'required|min:3|max:225',
            'message' => 'min:3|max:225',
            'cvFile'=> 'required|mimes:doc,docs,pdf'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $apply=new CareerApply;
            $apply->careerID=$request->inputHidden;
            $apply->fullname=$request->name. ' '.$request->surname;
			$apply->email=$request->email;
			$apply->message=$request->message;

            $file_name = time().'.'.$request->cvFile->extension();
            $path = $request->file('cvFile')->storeAs('uploads/cv/', $file_name, 'public');
            $request->cvFile->move(public_path('backend/career'), $file_name);
            $apply->cvFile=$file_name;

            $apply->save();

            return response()->json(['status'=>1, 'msg'=>'Career apply was successfully registered', 'state'=>'Congratulations!']);
        }         
    }

    public function indexAdmin(){
        $careers=Career::orderBy('created_at','desc')->get();
        $countries=Country::orderBy('name','asc')->get();
        return view('backend.careers', compact('careers', 'countries'));
    }

    public function showAdmin($id){
        $applies=CareerApply::where('careerID', $id)->orderBy('created_at','desc')->get();
        return view('backend.careers-detail', compact('applies'));
    }

    public function downloadAdmin($filename){
        $apply=CareerApply::where('cvFile', $filename)->first();
        $apply->status=1;
        $apply->save();

        $path = storage_path('app/public/uploads/cv/' . $filename);
        return response()->download($path);
    }

    public function createAdmin(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'inputTitle' => 'required|min:3|max:225',
            'selectLocation' => 'required',
            'selectWorkTime' => 'required',
            'inputExperience' => 'max:225',
            'inputFinishTime'=> 'required',
            'desc'=> 'required|min:3|max:225',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $career=new Career;
            $career->title=$request->inputTitle;
			$career->slug=Str::slug($request->inputTitle, '-');;
			$career->location=$request->selectLocation;
            $career->experience=$request->inputExperience;
            $career->worktime=$request->selectWorkTime;
            $career->finish_time=$request->inputFinishTime;
            $career->description=$request->desc;

            $career->save();

            return response()->json(['status'=>1, 'msg'=>'Career was successfully registered', 'state'=>'Congratulations!']);
        }         
    }
}

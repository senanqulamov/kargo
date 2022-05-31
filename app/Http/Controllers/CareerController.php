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
            'cvFile'=> 'required|mimes:doc,docs,pdf,docx'
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

        $path = public_path('backend/career/' . $filename);
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
			$career->slug=Str::slug($request->inputTitle, '-');
			$career->location=$request->selectLocation;
            $career->experience=$request->inputExperience;
            $career->worktime=$request->selectWorkTime;
            $career->finish_time=$request->inputFinishTime;
            $career->description=$request->desc;

            $career->save();

            return response()->json(['status'=>1, 'msg'=>'Career was successfully registered', 'state'=>'Congratulations!']);
        }         
    }

    public function activate($id)
    {
        $career=Career::where('id', $id)->first();
        
        if($career->status == 2){
            $career->status=1;
            toastr()->success('Career was activated', 'Congratulations!');
        } else {
            $career->status=2;
            toastr()->success('Career was deactivated', 'Congratulations!');
        }
        $career->save();
        
        return redirect()->route('admin.human.careers.index');
    }

    public function edit(Request $request)
    {
        $career=Career::find($request->id);
        return response()->json([
            'status' => 200,
            'data' => $career
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'inputTitle2' => 'required|min:3|max:225',
            'selectLocation2' => 'required',
            'selectWorkTime2' => 'required',
            'inputExperience2' => 'max:225',
            'inputFinishTime2'=> 'required',
            'desc2'=> 'required|min:3|max:225',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $id=$request->input('hiddenID');

            $career=Career::find($id);
            $career->title=$request->inputTitle2;
			$career->slug=Str::slug($request->inputTitle2, '-');
			$career->location=$request->selectLocation2;
            $career->experience=$request->inputExperience2;
            $career->worktime=$request->selectWorkTime2;
            $career->finish_time=$request->inputFinishTime2;
            $career->description=$request->desc2;

            $career->save();

            return response()->json(['status'=>1, 'msg'=>'Career was successfully updated', 'state'=>'Congratulations!']);
        }         
    }

    public function delete($id)
    {
        Career::where('id', $id)->delete();
        toastr()->success('Career was successfully deleted', 'Congratulations!');
        return redirect()->route('admin.human.careers.index');
    }
}

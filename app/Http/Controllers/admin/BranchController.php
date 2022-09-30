<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Branch;
use App\Models\Country;

use Validator;

class BranchController extends Controller
{
    public function index(){
		$branches=Branch::orderBy('created_at','asc')->get();
		$countries=Country::orderBy('name','asc')->get();
        $page_title = "Branch Lists";

        return view('backend.branch-list', compact('branches', 'countries' , 'page_title'));
    }

    public function create(){
		$branches=Branch::orderBy('created_at','asc')->get();
		$countries=Country::orderBy('name','asc')->get();
        $page_title = "Branch Create";

        return view('backend.branch', compact('branches', 'countries' , 'page_title'));
    }

	public function createPost(Request $request){
        $request->validate([
            'inputTitle' => 'required|min:3|max:225',
            'inputLongitude' => 'required|min:3|max:225',
            'inputLatitude' => 'required|min:3|max:225',
            'textareaAddress' => 'required|min:3|max:225',
            'selectCountry' => 'required'
        ]);

        $branch=new Branch;
        $branch->title=$request->inputTitle;
        $branch->longitude=$request->inputLongitude;
        $branch->latitude=$request->inputLatitude;
        $branch->address=$request->textareaAddress;
        $branch->country=$request->selectCountry;
        $branch->save();

        toastr()->success('Branch was successfully registered', 'Congratulations!!');
        return redirect()->route('admin.branches.index');
    }

    public function edit(Request $request)
    {
        $branch=Branch::find($request->id);
        return response()->json([
            'status' => 200,
            'data' => $branch
        ]);
    }

	public function update(Request $request){
        $validator = Validator::make($request->all(),[
            'inputTitle2' => 'required|min:3|max:225',
            'inputLongitude2' => 'required|min:3|max:225',
            'inputLatitude2' => 'required|min:3|max:225',
            'textareaAddress2' => 'required|min:3|max:225',
            'selectCountry2' => 'required'
        ]);

		if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
			$branch_id=$request->input('hiddenID');

			$branch=Branch::find($branch_id);
			$branch->title=$request->inputTitle2;
			$branch->longitude=$request->inputLongitude2;
			$branch->latitude=$request->inputLatitude2;
			$branch->address=$request->textareaAddress2;
			$branch->country=$request->selectCountry2;
			$branch->save();

			return response()->json(['status'=>1, 'msg'=>'Branch has been successfully updated', 'state'=>'Congratulations!']);
		}
    }

	public function delete($id){
        Branch::where('id', $id)->delete();
        toastr()->success('Branch was successfully deleted', 'Congratulations!');
        return redirect()->route('admin.branches.index');
    }

    public function change($id)
    {
        $branch=Branch::where('status', 1)->first();
        $branch->status=NULL;
        $branch->save();

        $head=Branch::find($id);
        $head->status=1;
        $head->save();

        toastr()->success('Branch was successfully Head Office', 'Congratulations!!');
        return redirect()->route('admin.branches.index');
    }
}

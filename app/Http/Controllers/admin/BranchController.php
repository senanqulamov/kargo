<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Branch;

class BranchController extends Controller
{
    public function index(){		
		$branches=Branch::orderBy('created_at','desc')->get();

        return view('backend.branch', compact('branches'));
    }
	
	public function create(Request $request){
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

    public function edit($id)
    {
        $faqs=Branch::find($id);
        return response()->json([
            'status' => 200,
            'data' => $faqs
        ]);
    }
	
	public function update(Request $request){
        $request->validate([
            'inputTitle' => 'required|min:3|max:225',
            'inputLongitude' => 'required|min:3|max:225',
            'inputLatitude' => 'required|min:3|max:225',
            'textareaAddress' => 'required|min:3|max:225',
            'selectCountry' => 'required'
        ]);

        $branch_id=$request->input('hiddenID');

        $branch=Branch::find($branch_id);
        $branch->title=$request->inputTitle;
        $branch->longitude=$request->inputLongitude;
        $branch->latitude=$request->inputLatitude;
        $branch->address=$request->textareaAddress;
        $branch->country=$request->selectCountry;
        $branch->save();

        toastr()->success('branch has been successfully updated', 'Congratulations!!');
        return redirect()->route('admin.branches.index');  
    }
	
	public function delete($id){
        Branch::where('id', $id)->delete();
        toastr()->success('Branch was successfully deleted', 'Congratulations!');
        return redirect()->route('admin.branches.index');
    }
}

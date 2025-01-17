<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Shelf;
use App\Models\Wardrobe;

use Validator;

class ShelfController extends Controller
{
    public function index()
    {
        $shelves=Shelf::orderBy('created_at','desc')->get();
        $wardrobes=Wardrobe::orderBy('created_at','desc')->get();
        $page_title = "Shelves";

        return view('backend.shelf', compact('shelves', 'wardrobes' ,'page_title'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'selectCategory' => 'required',
            'inputTitle' => 'required|min:1|max:225',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $shelf=new Shelf;
            $shelf->wardrobeID=$request->selectCategory;
            $shelf->title=$request->inputTitle;
            $shelf->description=$request->textareaDescription;
            $shelf->save();

            return response()->json(['status'=>1, 'msg'=>'Shelf was successfully registered', 'state'=>'Congratulations!']);
        }
    }

    public function edit(Request $request)
    {
        $shelf=Shelf::find($request->id);
        return response()->json([
            'status' => 200,
            'data' => $shelf
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'selectCategory2' => 'required',
            'inputTitle2' => 'required|min:1|max:225'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $faqs_id=$request->input('hiddenID');

            $shelf=Shelf::find($faqs_id);
            $shelf->wardrobeID=$request->selectCategory2;
            $shelf->title=$request->inputTitle2;
            $shelf->description=$request->textareaDescription2;
            $shelf->update();

            return response()->json(['status'=>1, 'msg'=>'Shelf has been successfully updated', 'state'=>'Congratulations!']);
        }


    }

    public function delete($id)
    {
        Shelf::where('id', $id)->delete();
        toastr()->success('Shelf was successfully deleted', 'Congratulations!');
        return redirect()->route('admin.wardrobes.shelves.index');
    }

	public function activate($id)
    {
        $shelf=Shelf::where('id', $id)->first();

        if($shelf->status == 0){
            $shelf->status=1;
            toastr()->success('Shelf is completely full', 'Congratulations!');
        } else {
            $shelf->status=0;
            toastr()->success('Shelf is completely empty', 'Congratulations!');
        }
        $shelf->save();

        return redirect()->route('admin.wardrobes.shelves.index');
    }
}

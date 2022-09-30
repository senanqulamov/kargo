<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Wardrobe;
use App\Models\Shelf;

class WardrobeController extends Controller
{
    public function index()
    {
        $wardrobes=Wardrobe::orderBy('created_at','desc')->get();
        $page_title = "Wardrobes";

        return view('backend.wardrobe', compact('wardrobes' , 'page_title'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'inputTitle' => 'required|min:1|max:225'
        ]);

            $wardrobe=new Wardrobe;
            $wardrobe->title=$request->inputTitle;
            $wardrobe->description=$request->textareaDescription;
            $wardrobe->save();
toastr()->success('Wardrobe created succesfully', 'Congratulations');
            return redirect()->route('admin.wardrobes.index');
    }

    public function edit(Request $request)
    {
        $wardrobe=Wardrobe::find($request->id);
        return response()->json([
            'status' => 200,
            'data' => $wardrobe
        ]);
    }

    public function update(Request $request)
    {
    $request->validate([
            'inputTitle2' => 'required|min:1|max:225'
        ]);

        $faqs_id=$request->input('hiddenID');

            $wardrobe=Wardrobe::find($faqs_id);
            $wardrobe->title=$request->inputTitle2;
            $wardrobe->description=$request->textareaDescription2;
            $wardrobe->update();
toastr()->success('Wardrobe updated succesfully', 'Congratulations!');
return redirect()->route('admin.wardrobes.index');
    }

    public function delete($id)
    {
        $search_shelf=Shelf::where('wardrobeID', $id)->count();

		if($search_shelf > 0){
			toastr()->error('This wardrobe is used in the Shelves section', 'Ooops!');
			return redirect()->route('admin.wardrobes.index');
		} else {
			Wardrobe::where('id', $id)->delete();
			toastr()->success('Wardrobe was successfully deleted', 'Congratulations!');
			return redirect()->route('admin.wardrobes.index');
		}
    }
}

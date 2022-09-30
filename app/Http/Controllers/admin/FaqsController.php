<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Faqs;
use App\Models\FaqsCategory;

use Validator;

class FaqsController extends Controller
{
    public function index()
    {
        $faqs=Faqs::orderBy('created_at','desc')->get();
        $categories=FaqsCategory::orderBy('title','desc')->get();
        $page_title = "FAQ";

        return view('backend.faqs', compact('faqs', 'categories' , 'page_title'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'selectCategory' => 'required',
            'inputQuestion' => 'required|min:3|max:225',
            'textareaAnswer' => 'required|min:3'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $faqs=new Faqs;
            $faqs->categoryID=$request->selectCategory;
            $faqs->question=$request->inputQuestion;
            $faqs->answer=$request->textareaAnswer;
            $faqs->save();

            return response()->json(['status'=>1, 'msg'=>'FAQS was successfully registered', 'state'=>'Congratulations!']);
        }
    }

    public function edit(Request $request)
    {
        $faqs=Faqs::find($request->id);
        return response()->json([
            'status' => 200,
            'data' => $faqs
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'selectCategory2' => 'required',
            'inputQuestion2' => 'required|min:3|max:225',
            'textareaAnswer2' => 'required|min:3'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $faqs_id=$request->input('hiddenID');

            $faqs=Faqs::find($faqs_id);
            $faqs->categoryID=$request->selectCategory2;
            $faqs->question=$request->inputQuestion2;
            $faqs->answer=$request->textareaAnswer2;
            $faqs->update();

            return response()->json(['status'=>1, 'msg'=>'FAQS has been successfully updated', 'state'=>'Congratulations!']);
        }


    }

    public function delete($id)
    {
        Faqs::where('id', $id)->delete();
        toastr()->success('Faqs was successfully deleted', 'Congratulations!');
        return redirect()->route('admin.faqs.index');
    }

	public function categories()
    {
		$categories=FaqsCategory::orderBy('title','desc')->get();
        $page_title = "Faq Categories";

        return view('backend.faqs-category', compact('categories' , 'page_title'));
    }

	public function createCategory(Request $request)
    {
        $request->validate([
            'inputCategory' => 'required|min:3|max:225'
        ]);

        $faqsCategory=new FaqsCategory;
        $faqsCategory->title=$request->inputCategory;
        $faqsCategory->save();

        toastr()->success('Category was successfully registered', 'Congratulations!!');
        return redirect()->route('admin.faqs.categories.index');
    }

    public function editCategory(Request $request)
    {
        $faqsCategory=FaqsCategory::find($request->id);
        return response()->json([
            'status' => 200,
            'data' => $faqsCategory
        ]);
    }

	public function updateCategory(Request $request)
    {
        $request->validate([
            'inputCategory2' => 'required|min:3|max:225'
        ]);

        $faqscategories_id=$request->input('hiddenID');

        $faqsCategory=FaqsCategory::find($faqscategories_id);
        $faqsCategory->title=$request->inputCategory2;
        $faqsCategory->update();

        toastr()->success('Category has been successfully updated', 'Congratulations!!');
        return redirect()->route('admin.faqs.categories.index');
    }

	public function deleteCategory($id)
    {
		$check=Faqs::where('categoryID', $id)->count();

		if($check > 0){
			toastr()->error('This category is used in the FAQS section', 'Ooops!');
			return redirect()->route('admin.faqs.categories.index');
		} else {
			FaqsCategory::where('id', $id)->delete();
			toastr()->success('Category was successfully deleted', 'Congratulations!');
			return redirect()->route('admin.faqs.categories.index');
		}
    }

    public function indexFront()
    {
        $faqs = Faqs::all();
        $categories = FaqsCategory::all();
        $page_title = "FAQ";

        return view('frontend.faqs',compact('categories','faqs' , 'page_title'));
    }
}

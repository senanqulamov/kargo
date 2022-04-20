<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Faqs;

class FaqsController extends Controller
{
    public function index()
    {
        $faqs=Faqs::orderBy('created_at','desc')->get();

        return view('backend.faqs', compact('faqs'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'selectCategory' => 'required',
            'inputQuestion' => 'required|min:3|max:225',
            'textareaAnswer' => 'required|min:3|max:225'
        ]);

        $faqs=new Faqs;
        $faqs->category=$request->selectCategory;
        $faqs->question=$request->inputQuestion;
        $faqs->answer=$request->textareaAnswer;
        $faqs->save();

        toastr()->success('FAQS was successfully registered', 'Congratulations!!');
        return redirect()->route('admin.faqs.index');  
    }

    public function edit($id)
    {
        $faqs=Faqs::find($id);
        return response()->json([
            'status' => 200,
            'data' => $faqs
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'selectCategory' => 'required',
            'inputQuestion' => 'required|min:3|max:225',
            'textareaAnswer' => 'required|min:3|max:225'
        ]);

        $faqs_id=$request->input('hiddenID');

        $faqs=Faqs::find($faqs_id);
        $faqs->category=$request->selectCategory;
        $faqs->question=$request->inputQuestion;
        $faqs->answer=$request->textareaAnswer;
        $faqs->update();

        toastr()->success('FAQS has been successfully updated', 'Congratulations!!');
        return redirect()->route('admin.faqs.index');  
    }

    public function delete($id)
    {
        Faqs::where('id', $id)->delete();
        toastr()->success('Faqs was successfully deleted', 'Congratulations!');
        return redirect()->route('admin.faqs.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;
use App\Models\ContactService;

use Validator;

class MessageController extends Controller
{
    public function inbox(){
        $messages=Message::orderBy('created_at','desc')->get();
        return view('backend.inbox', compact('messages'));
    }

    public function read($id){
        $message_data=Message::where('id', $id)->first();

        $update=Message::where('id', $id)->first();
        $update->status=2;
        $update->save();

        return view('backend.read', compact('message_data'));
    }

    public function delete($id){
        Message::where('id', $id)->delete();
        toastr()->success('Message was successfully deleted', 'Congratulations!');
        return redirect()->route('admin.messages.inbox');
    }

    public function indexFront(){
        $services=ContactService::orderBy('created_at','desc')->get();
        return view('frontend.contact', compact('services'));
    }

    public function indexFrontPost(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3|max:225',
            'surname' => 'required|min:3|max:225',
            'email' => 'required|email',
            'phone' => 'required|min:3|max:225',
            'service' => 'required',
            'subject' => 'required|min:3|max:225',
            'message' => 'required|min:3|max:225',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $mesage=new Message;
            $mesage->name=$request->name.' '.$request->name;
            $mesage->email=$request->email;
            $mesage->phone=$request->phone;
            $mesage->service=$request->service;
            $mesage->subject=$request->subject;
            $mesage->message=$request->message;

            $mesage->save(); 

            return response()->json(['status'=>1, 'msg'=>'Message apply was successfully registered', 'state'=>'Congratulations!']);
        }               
    }

    public function settings()
    {
		$categories=ContactService::orderBy('title','desc')->get();
        return view('backend.contact-settings', compact('categories'));
    }
	
	public function createCategory(Request $request)
    {
        $request->validate([
            'inputCategory' => 'required|min:3|max:225'
        ]);

        $category=new ContactService;
        $category->title=$request->inputCategory;
        $category->save();

        toastr()->success('Category was successfully registered', 'Congratulations!!');
        return redirect()->route('admin.messages.settings.index');  
    }

    public function editCategory(Request $request)
    {
        $category=ContactService::find($request->id);
        return response()->json([
            'status' => 200,
            'data' => $category
        ]);
    }
	
	public function updateCategory(Request $request)
    {
        $request->validate([
            'inputCategory2' => 'required|min:3|max:225'
        ]);

        $categories_id=$request->input('hiddenID');

        $category=ContactService::find($categories_id);
        $category->title=$request->inputCategory2;
        $category->update();

        toastr()->success('Category has been successfully updated', 'Congratulations!!');
        return redirect()->route('admin.messages.settings.index');  
    }
	
	public function deleteCategory($id)
    {
		$check=Message::where('service', $id)->count();
		
		if($check > 0){
			toastr()->error('This category is used in the messages section', 'Ooops!');
			return redirect()->route('admin.messages.settings.index');
		} else {
			ContactService::where('id', $id)->delete();
			toastr()->success('Category was successfully deleted', 'Congratulations!');
			return redirect()->route('admin.messages.settings.index');
		}        
    }
}

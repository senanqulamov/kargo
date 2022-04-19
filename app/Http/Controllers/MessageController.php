<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;

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
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User as UserModel;
use Validator;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users=UserModel::all();

        return view('backend.users', compact('users'));
    }

    public function details($id){
        $user=UserModel::where('id', $id)->first();

        return view('backend.user-detail', compact('user'));
    }

    public function updateUserGeneral(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'username' => 'required|min:3|max:225',
            'email' => 'required|min:3|max:225',
            'phone' => 'required|min:3|max:225'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $user=UserModel::find($id);
            $user->name=$request->username;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->update();

            return response()->json(['status'=>1, 'msg'=>'User data has been successfully updated', 'state'=>'Congratulations!']);
        }
    }

    public function updateUserPassword(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'inputPassword' => 'required|min:3|max:225',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $user=UserModel::find($id);
            $user->password=Hash::make($request->inputPassword);
            $user->update();

            return response()->json(['status'=>1, 'msg'=>'User data has been successfully updated', 'state'=>'Congratulations!']);
        }
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->city=$request->city;
        $user->phone='994'.$request->phone;
        $user->sex=$request->sex;
        $user->store=$request->store;
        $user->referer=$request->referer;

        if ($request->has('promotion')) {
            $user->promotion=$request->promotion;
        }

        if ($request->has('shipment')) {
            $user->shipment=$request->shipment;
        }
        
        $user->save();

        return response()->json(['status' => 1, 'user' => $user], 200);
    }

    public function login(LoginRequest $request){
        if(!Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return response()->json(['error' => 'invalid_credentials'], 401);
        }

        $user=auth()->user();

        $status=User::where('id', Auth::id())->first();
        $status->status='1';
        $status->save();

        $token = $user->createToken('token')->plainTextToken;

        return response([
            'status' => 1,
            'token' => $token,
            'user' => $user,
        ], 200);
    }

    public function logout(){
        $status=User::where('id', Auth::id())->first();
        $status->status=NULL;
        $status->save();

        request()->user()->currentAccessToken()->delete();

        return response([
            'status'=> 1,
        ], 200);
    }
}

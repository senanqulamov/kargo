<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserAddress;
use App\Http\Requests\UserAddressRequest;

use Illuminate\Support\Facades\Auth;

class UserAddressController extends Controller
{
    public function create(UserAddressRequest $request)
    {

        $address=new UserAddress();
        $address->userID=Auth::id();
        $address->country=$request->country;
        $address->state=$request->state;
        $address->city=$request->city;
        $address->address=$request->address;
        $address->zipcode=$request->zipcode;
        $address->name=$request->name;
        $address->phone=$request->phone;
        $address->email=$request->email;
        
        $address->save();

        return response()->json(['status' => 1, 'address' => $address], 200);
    }

    public function delete($id)
    {
        UserAddress::where('id', $id)->delete();
        return response()->json(['status' => 1, 'message' => "address silindi"], 200);
    }
}

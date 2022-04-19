<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserAddress;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        
        return view('backend.users', compact('users'));
    }

    public function details($id){
        $user=User::where('id', $id)->first();

        $userAddress=UserAddress::where('userID', $user->id)->get();

        if(count($userAddress) > 0){            
            return view('backend.user-detail', compact('user', 'userAddress'));
        } else {
            toastr()->error('The shipping address for this account is not included', 'Ooops!');
            return redirect()->route('admin.users');
        }
    }
}

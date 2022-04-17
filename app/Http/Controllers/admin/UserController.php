<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        
        return view('backend.users', compact('users'));
    }

    public function details($id){
        $user=User::where('id', $id)->first();
        
        return view('backend.user-detail', compact('user'));
    }
}

<?php

namespace App\Http\Controllers\userpanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cargo_request;
use Illuminate\Support\Facades\Auth;

class SimplePages extends Controller
{
    public function share_and_earn()
    {

        return view('userpanel.helpers.share_and_earn');
    }

    public function support()
    {

        $orders = Cargo_request::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        return view('userpanel.helpers.support', compact('orders'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Balance;
use App\Models\CreditCard;

class BalanceController extends Controller
{
    public function index(){
        $balances=Balance::orderBy('created_at','desc')->get();
        return view('backend.balance',compact('balances'));
    }

    public function cards(Request $request)
    {
        $card=CreditCard::where('userID', $request->id)->first();
        return response()->json([
            'status' => 200,
            'data' => $card
        ]);
    }
}

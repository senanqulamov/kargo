<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Balance;
use App\Models\CreditCard;
use App\Models\Payment;
use App\Models\User;
use DB;

class BalanceController extends Controller
{
    public function balance(){
        $balances=Balance::orderBy('created_at','desc')->get();
        return view('backend.balance',compact('balances'));
    }

    public function payments(){
        $payments=DB::table('payments')->orderBy('created_at','desc')->get();
        return view('backend.payments',compact('payments'));
    }

    public function denyPayment(Request $request){

        $payment = Payment::find($request->id);
        $payment->payment_status = $request->payment_status;
        $payment->deny_message = $request->deny_message;
        $payment->save();

        return response()->json([
            'message' => 'payment denied'
        ]);
    }

    public function approvePayment(Request $request){

        $payment = Payment::find($request->id);
        $payment->payment_status = $request->payment_status;
        $payment->deny_message = null;
        $payment->save();

        $user_payment = Payment::where('id' , $request->id)->get()->first();

        $user = User::find($user_payment->userID);
        $user->balance = $user->balance + $user_payment->amount;
        $user->save();

        return response()->json([
            'message' => 'payment approved'
        ]);
    }

    public function cards(Request $request)
    {
        $card=CreditCard::where('userID', $request->id)->first();
        return response()->json([
            'status' => 200,
            'data' => $card
        ]);
    }

    public function comissions(){

        $comissions=DB::table('comissions')->get();
        return view('backend.comissions',compact('comissions'));
    }
}

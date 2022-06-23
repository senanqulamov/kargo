<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Balance;
use App\Models\Comission;
use App\Models\CreditCard;
use App\Models\MoneyBackRequest;
use App\Models\Payment;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Redirect;

class BalanceController extends Controller
{
    public function balance(){
        $users=User::orderBy('balance','desc')->get();
        return view('backend.balance',compact('users'));
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

    public function updatePayment(Request $request){

        $data = array(
            'method' => $request->method,
            'comission' => $request->comission,
            'amount' => $request->amount,
            'money_type' => $request->money_type
        );

        Payment::where('id' , $request->payment_id)->update($data);

        return Redirect::back()->with('message' , 'Payment method Comission updated succesfully');
    }

    public function updateComission(Request $request){

        $data = array(
            'payment' => $request->payment,
            'comission' => $request->comission,
            'css_class' => $request->css_class,
            'show_name' => $request->show_name
        );

        Comission::where('id' , $request->comission_id)->update($data);

        return Redirect::back()->with('message' , 'Payment method Comission updated succesfully');
    }

    public function moneyBackRequests(){

        $moneyback_requests = MoneyBackRequest::get();

        return view('backend.moneyback')->with('requests' , $moneyback_requests);
    }
}

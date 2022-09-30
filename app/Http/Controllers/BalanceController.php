<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Balance;
use App\Models\Comission;
use App\Models\CreditCard;
use App\Models\MoneyBackRequest;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use stdClass;

class BalanceController extends Controller
{
    public function balance()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->get();
        $page_title = "Balance";

        return view('backend.transactions', compact('transactions' , 'page_title'));
    }

    public function payments()
    {
        $payments = DB::table('payments')->orderBy('created_at', 'desc')->get();
        $kur = $this->getKur();
        $page_title = "Payments";

        return view('backend.payments', compact('payments' , 'kur' , 'page_title'));
    }

    public function denyPayment(Request $request)
    {

        $payment = Payment::find($request->id);
        $payment->payment_status = $request->payment_status;
        $payment->deny_message = $request->deny_message;
        $payment->save();

        $transaction = Transaction::where('payment_id', $request->id)->first();
        if ($transaction) {
            $user_payment = Payment::where('id', $request->id)->get()->first();
            $user = User::find($user_payment->userID);

            $data = new stdClass();
            $data->user_id = $user_payment->userID;
            $data->payment_id = $request->id;
            $data->old_balance = $user->balance;
            $data->new_balance = $user->balance - $user_payment->result_price;
            $data->transfer_method = "Payment Deny";

            $user->balance = $user->balance - $user_payment->result_price;
            $user->save();

            (new HelperController)->checkTransaction($data);
        }

        return response()->json([
            'message' => 'payment denied'
        ]);
    }

    public function approvePayment(Request $request)
    {

        $payment = Payment::find($request->id);
        $payment->payment_status = $request->payment_status;
        $payment->deny_message = null;
        $payment->save();

        $user_payment = Payment::where('id', $request->id)->get()->first();
        $user = User::find($user_payment->userID);

        $data = new stdClass();
        $data->user_id = $user_payment->userID;
        $data->payment_id = $request->id;
        $data->old_balance = $user->balance;
        $data->new_balance = $user->balance + $user_payment->result_price;
        $data->transfer_method = "Payment Approval";

        // Updating balance
        $user->balance = $user->balance + $user_payment->result_price;
        $user->save();


        (new HelperController)->checkTransaction($data);

        return response()->json([
            'message' => 'payment approved'
        ]);
    }

    public function cards(Request $request)
    {
        $card = CreditCard::where('userID', $request->id)->first();
        return response()->json([
            'status' => 200,
            'data' => $card
        ]);
    }

    public function comissions()
    {

        $comissions = DB::table('comissions')->get();
        $page_title = "Comissions";

        return view('backend.comissions', compact('comissions' , 'page_title'));
    }

    public function updatePayment(Request $request)
    {
        $data = array(
            'method' => $request->method,
            'amount' => $request->amount,
            'comission' => $request->comission,
            'result_price' => $request->result_price,
            'money_type' => $request->money_type
        );

        Payment::where('id', $request->payment_id)->update($data);

        return Redirect::back()->with('message', 'Payment updated succesfully');
    }

    public function addnewComission(Request $request)
    {
        // dd($request->all() , $request->image);

        $file = $request->image;
        $name = $file->getClientOriginalName();
        $file->move(public_path() . '/images/', $name);

        $classes = ['balance__cards-box--1', 'balance__cards-box--2', 'balance__cards-box--3'];
        $css_class = $classes[array_rand($classes)];

        $data = array(
            'payment' => $request->payment,
            'show_name' => $request->show_name,
            'comission' => $request->comission,
            'image' => $name,
            'css_class' => $css_class
        );

        Comission::create($data);

        return Redirect::back()->with('message', 'New payment method added succesfully');
    }

    public function updateComission(Request $request)
    {
        // dd($request->all());

        if ($request->hasFile('image')) {
            $file = $request->image;
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);

            $data = array(
                'payment' => $request->payment,
                'show_name' => $request->show_name,
                'comission' => $request->comission,
                'image' => $name,
            );
        } else {
            $data = array(
                'payment' => $request->payment,
                'show_name' => $request->show_name,
                'comission' => $request->comission
            );
        }

        Comission::where('id', $request->comission_id)->update($data);

        return Redirect::back()->with('message', 'Payment method updated succesfully');
    }

    public function deleteComission($id)
    {
        Comission::where('id', $id)->delete();

        return Redirect::back()->with('message', 'Payment method deleted succesfully');
    }

    public function moneyBackRequests()
    {

        $moneyback_requests = MoneyBackRequest::get();
        $page_title = "Money Back Requests";

        return view('backend.moneyback')->with([
            'requests' => $moneyback_requests,
            'page_title' => $page_title
        ]);
    }

    public function transactions(){

        $transactions = Transaction::all();
        $page_title = "Transactions";

        return view('backend.transactions')->with([
            'transactions' => $transactions,
            'page_title' => $page_title
        ]);

    }

    public function addPayment(Request $request){

        // dd($request->all());

        if ($request->document) {
            $file = $request->document;
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/files/payments/', $name);
        }
        $credentials = array(
            'userID' => $request->user_id,
            'method' => $request->method,
            'amount' => $request->amount,
            'comission' => $request->comission,
            'result_price' => $request->result_price,
            'kur' => $request->kur,
            'money_type' => $request->money_type,
            'payment_comment' => json_encode($request->payment_comment),
            'document' => $name
        );

        Payment::create($credentials);

        return Redirect::back()->with('message', 'Payment added succesfully');
    }

    public function getKur()
    {
        $xml = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');

        $index = 3;

        $name = $xml->Currency[$index]->CurrencyName;
        $buying = $xml->Currency[$index]->BanknoteBuying;
        $selling = $xml->Currency[$index]->BanknoteSelling;
        return $selling;
    }
}

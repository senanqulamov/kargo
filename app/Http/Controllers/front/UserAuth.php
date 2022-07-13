<?php

namespace App\Http\Controllers\front;

use App\Models\User as UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class UserAuth extends Controller
{

    public function create(Request $request)
    {
        // dd($request->all());

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'country' => 'required',
            'password' => 'required'
        ]);

        if (Usermodel::where('email', '=', $request->email)->count() > 0) {
            $error = 'This email is already registered';
            return redirect()->back()->withErrors($error)
                ->withInput($request->except('password'));
        } else if (Usermodel::where('phone', '=', $request->phone)->count() > 0) {
            $error = 'This phone is already registered';
            return redirect()->back()->withErrors($error)
                ->withInput($request->except('password'));
        }

        $email_data = array(
            'name' => $request->name,
            'email' => $request->email,
        );

        Mail::send('userpanel.frontend.emailview', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['name'])
                ->subject('Welcome to ShipLounge')
                ->from('noreply@shiplounge.co', 'ShipLounge');
        });

        $password = Hash::make($request->password);
        $credentials = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'password' => $password
        );
        $user = UserModel::create($credentials);

        return redirect()->route('login')->with('message', 'Confirm your email address');
    }

    public function login(Request $request)
    {

        $rules = array(
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $error = "Something happened";
            return redirect()->back()->withErrors($error)
                ->withInput($request->except('password'));
        }
        $logging_user = UserModel::where('email', $request->email)->first();

        if (!$logging_user) {
            $error = "This email is not registered";
            return redirect()->back()->withErrors($error)
                ->withInput($request->except('password'));
        } else {
            if (!$logging_user->email_verified_at) {
                $error = "This email is not verified";
                return redirect()->back()->withErrors($error)
                    ->withInput($request->except('password'));
            }
        }

        $user = array(
            'email' => $request->email,
            'password' => $request->password
        );

        if (Auth::attempt($user)) {
            $username = UserModel::where('email', $request->email)->first();
            $username = $username->name;
            return redirect()->route('userpanel.index')->with('log_in_message', 'Logged in as ' . $username . ' !');
        } else {
            $error = "Wrong password";
            return redirect()->back()->withErrors($error)
                ->withInput($request->except('password'));
        }
    }

    public function verifyEmail($email){

        $now = Carbon::now();

        UserModel::where('email' , $email)->first()->update([
            'email_verified_at' => $now
        ]);

        return redirect()->route('login')->with('message' , $email.' succesfully verified , you can login now');
    }

    public function logout()
    {

        Auth::logout();

        return redirect()->route('login')->with('message', 'Logged out successfully');
    }
}

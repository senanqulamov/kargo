<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User as UserModel;
use Illuminate\Foundation\Auth\User;
use Validator;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function index()
    {
        $users = UserModel::orderBy('id', 'DESC')->get();

        return view('backend.users', compact('users'));
    }

    public function details($id)
    {
        $user = UserModel::where('id', $id)->first();

        return view('backend.user-detail', compact('user'));
    }

    public function updateUserGeneral(Request $request, $id)
    {

        $request->request->remove('_token');
        $data = collect(request()->all())->filter(function ($value) {
            return null !== $value;
        })->toArray();

        if ($data) {
            UserModel::where('id', $id)->update($data);

            return Redirect::back()->with('message', $data["name"] . " Updated succesfully");
        } else {
            return Redirect::back()->with('message', "Couldn't update user");
        }
    }

    public function updateUserPassword(Request $request, $id)
    {

        $password = Hash::make($request->password);
        $data =  array(
            'password' => $password
        );
        $user = UserModel::find($id);

        if ($data) {
            UserModel::where('id', $id)->update($data);

            return Redirect::back()->with('message', "Password of ".$user->name." Updated succesfully");
        } else {
            return Redirect::back()->with('message', "Couldn't update user password");
        }
    }

    public function sendEmail(Request $request){

        $user = User::where('email' , '=' , $request->email)->get()->first();
        $email_data = array(
            'name' => $user->name,
            'email' => $user->email,
            'admin_message' => $request->message
        );

        // dd($request->message);

        Mail::send('backend.mails.sendemailtouser', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['name'])
                ->subject('ShipLounge Notification')
                ->from('noreply@shiplounge.co', 'ShipLounge');
        });

        return Redirect::back()->with('message' , 'Email sent to '.$user->email);
    }
}

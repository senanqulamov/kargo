<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User as UserModel;
use Validator;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


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
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Models\PermissionPage;
use Illuminate\Http\Request;

use App\Models\User as UserModel;
use App\Models\User_role;
use App\Models\UserLog;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Validator;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use stdClass;

class UserController extends Controller
{
    public function index()
    {
        $users = UserModel::orderBy('id', 'DESC')->get();
        $page_title = "Users";

        return view('backend.users', compact('users' , 'page_title'));
    }

    public function details($id)
    {
        $user = UserModel::where('id', $id)->first();
        $page_title = "User Details";

        return view('backend.user-detail', compact('user' , 'page_title'));
    }

    public function updateUserGeneral(Request $request, $id)
    {
        // dd($request->all());

        $user = User::where('id', $id)->first();
        if ($request->balance != $user->balance) {
            $email_data = [
                'name' => $user->name,
                'email' => $user->email,
                'mod_text' => 'Your balance changed by ShipLounge moderator',
                'status' => $request->status,
            ];
            Mail::send(
                'backend.mails.profilechangeMail',
                $email_data,
                function ($message) use ($email_data) {
                    $message
                        ->to($email_data['email'], $email_data['name'])
                        ->subject('ShipLounge , Order notification')
                        ->from('noreply@shiplounge.co', 'ShipLounge');
                }
            );

            $data = new stdClass();
            $data->user_id = $user->id;
            $data->payment_id = null;
            $data->old_balance = $user->balance;
            $data->new_balance = $request->balance;
            $data->transfer_method = 'User balance changed by moderator';
            (new HelperController())->checkTransaction($data);
        }

        $request->request->remove('_token');
        $user_data = collect(request()->all())
            ->filter(function ($value) {
                return null !== $value;
            })
            ->toArray();

        // dd($user_data , $id);

        if ($user_data) {
            $user = UserModel::find($id);
            $user->update($user_data);
            $changes = $user->getChanges();
            unset($changes['updated_at']);

            $log = new stdClass();
            $log->user_id = $user->id;
            $log->moderator_id = Auth::user()->id;
            $log->title = 'User profile changed by moderator';
            $log->action = json_encode($changes);
            (new HelperController())->userLogs($log);

            return Redirect::back()->with(
                'message',
                $user_data['name'] . ' Updated succesfully'
            );
        } else {
            return Redirect::back()->with('message', "Couldn't update user");
        }
    }

    public function updateUserPassword(Request $request, $id)
    {
        $password = Hash::make($request->password);
        $data = [
            'password' => $password,
        ];
        $user = UserModel::find($id);

        if ($data) {
            UserModel::where('id', $id)->update($data);

            return Redirect::back()->with(
                'message',
                'Password of ' . $user->name . ' Updated succesfully'
            );
        } else {
            return Redirect::back()->with(
                'message',
                "Couldn't update user password"
            );
        }
    }

    public function sendEmail(Request $request)
    {
        $user = User::where('email', '=', $request->email)
            ->get()
            ->first();
        $email_data = [
            'name' => $user->name,
            'email' => $user->email,
            'admin_message' => $request->message,
        ];

        // dd($request->message);

        Mail::send('backend.mails.sendemailtouser', $email_data, function (
            $message
        ) use ($email_data) {
            $message
                ->to($email_data['email'], $email_data['name'])
                ->subject('ShipLounge Notification')
                ->from('noreply@shiplounge.co', 'ShipLounge');
        });

        return Redirect::back()->with(
            'message',
            'Email sent to ' . $user->email
        );
    }

    public function addnew(Request $request)
    {
        // dd($request->all());

        if (
            UserModel::where('email', $request->email)->first() ||
            UserModel::where('phone', $request->phone)->first()
        ) {
            return Redirect::back()->with(
                'error',
                'This email or phone is already registered'
            );
        } else {
            $password = Hash::make($request->password);
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'phone' => $request->phone,
                'country' => $request->country,
                'city' => $request->city,
                'state' => $request->state,
                'address' => $request->address,
                'address_2' => $request->address_2,
                'postcode' => $request->postcode,
                'gender' => $request->gender,
                'membership' => $request->membership,
                'company_name' => $request->company_name,
                'tax_number' => $request->tax_number,
                'indetification_number' => $request->indetification_number,
                'tax_adminstration' => $request->tax_adminstration,
                'Iban' => $request->Iban,
                'balance' => $request->balance,
                'user_role' => $request->user_role,
                'is_admin' => $request->is_admin,
            ];

            UserModel::create($data);
            return Redirect::back()->with(
                'message',
                'New user with ' .
                    $request->email .
                    ' email has been created succesfully'
            );
        }
    }

    public function user_logs()
    {
        $logs = UserLog::all();
        $page_title = "User Logs";

        return view('backend.logs.user_logs', compact('logs' , 'page_title'));
    }

    public function ban_user($id)
    {
        $user = UserModel::find($id);
        $user->update([
            'is_banned' => 1,
        ]);
        $changes = $user->getChanges();
        unset($changes['updated_at']);

        $log = new stdClass();
        $log->user_id = $user->id;
        $log->moderator_id = Auth::user()->id;
        $log->title = 'User profile banned by moderator';
        $log->action = json_encode($changes);
        (new HelperController())->userLogs($log);

        return Redirect::back()->with(
            'message',
            $user->name . ' Banned Succesfully'
        );
    }

    public function unban_user($id)
    {
        $user = UserModel::find($id);
        $user->update([
            'is_banned' => 0,
        ]);
        $changes = $user->getChanges();
        unset($changes['updated_at']);

        $log = new stdClass();
        $log->user_id = $user->id;
        $log->moderator_id = Auth::user()->id;
        $log->title = 'User profile unbanned by moderator';
        $log->action = json_encode($changes);
        (new HelperController())->userLogs($log);

        return Redirect::back()->with(
            'message',
            $user->name . ' Unbanned Succesfully'
        );
    }

    public function user_roles()
    {
        $roles = User_role::all();
        $permission_pages = PermissionPage::all();
        $page_title = "User Roles";

        return view(
            'backend.helpers.user_roles',
            compact('roles', 'permission_pages' , 'page_title')
        );
    }

    public function create_new_role(Request $request)
    {
        // dd($request->all());
        $data = [
            'role_name' => $request->role_name,
            'view_permissions' => json_encode($request->view_permissions),
            'edit_permissions' => json_encode($request->edit_permissions),
            'background' => $request->background,
            'color' => $request->color
        ];

        User_role::create($data);

        return Redirect::back()->with(
            'message',
            'User Role updated succesfully'
        );
    }

    public function edit_role(Request $request)
    {
        $data = [
            'role_name' => $request->role_name,
            'view_permissions' => json_encode($request->view_permissions),
            'edit_permissions' => json_encode($request->edit_permissions),
            'background' => $request->background,
            'color' => $request->color
        ];

        User_role::where('id', $request->role_id)->update($data);

        return Redirect::back()->with(
            'message',
            'User Role updated succesfully'
        );
    }

    public function delete_role($id)
    {
        User_role::where('id', $id)->delete();

        return Redirect::back()->with(
            'message',
            'User Role deleted succesfully'
        );
    }

    public function create_new_page(Request $request)
    {
        $data = [
            'name' => $request->name,
            'title' => $request->title,
        ];
        PermissionPage::create($data);

        return Redirect::back()->with(
            'message',
            'New Permission Page added succesfully'
        );
    }

    public function edit_page(Request $request)
    {
        $data = [
            'name' => $request->name,
            'title' => $request->title,
        ];
        PermissionPage::where('id', $request->page_id)->update($data);

        return Redirect::back()->with(
            'message',
            'Permission Page updated succesfully'
        );
    }

    public function delete_page($id)
    {
        PermissionPage::where('id', $id)->delete();

        return Redirect::back()->with(
            'message',
            'Permission Page deleted succesfully'
        );
    }

    public function check_permissions($page_title){

        $permissions = User_role::where('id' , Auth::user()->user_role)->first();

        if(!collect(json_decode($permissions->view_permissions))->contains($page_title)){
            return "false";
        }else{
            return "true";
        }
    }

    public function check_action_permissions($page_title){
        $permissions = User_role::where('id' , Auth::user()->user_role)->first();

        if(!collect(json_decode($permissions->edit_permissions))->contains($page_title)){
            return "false";
        }else{
            return "true";
        }
    }
}

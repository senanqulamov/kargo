<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;
use App\Models\ContactService;
use App\Models\Branch;
use App\Models\Faqs;
use App\Models\FaqsCategory;
use App\Models\Notification;
use App\Models\Support_demand;
use App\Models\Support_message;
use App\Models\Usage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function inbox()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        $page_title = 'Messages';

        return view('backend.inbox', compact('messages', 'page_title'));
    }

    public function read($id)
    {
        $message_data = Message::where('id', $id)->first();

        $update = Message::where('id', $id)->first();
        $update->status = 2;
        $update->save();
        $page_title = 'Messages';

        return view('backend.read', compact('message_data', 'page_title'));
    }

    public function delete($id)
    {
        Message::where('id', $id)->delete();
        toastr()->success(
            'Message was successfully deleted',
            'Congratulations!'
        );
        return redirect()->route('admin.messages.inbox');
    }

    public function compose()
    {
        $page_title = 'Messages';

        return view('backend.compose', compact('page_title'));
    }

    public function indexFront()
    {
        $services = ContactService::orderBy('created_at', 'asc')->get();
        $branches = Branch::orderBy('created_at', 'desc')->get();
        $headOffice = Branch::where('status', 1)->first();
        $faqs = Faqs::all();
        $categories = FaqsCategory::all();
        $page_title = 'Messages';

        return view(
            'frontend.contact',
            compact(
                'services',
                'branches',
                'headOffice',
                'faqs',
                'categories',
                'page_title'
            )
        );
    }

    public function indexFrontPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:225',
            'surname' => 'required|min:3|max:225',
            'email' => 'required|email',
            'phone' => 'required|min:3|max:225',
            'service' => 'required',
            'subject' => 'required|min:3|max:225',
            'message' => 'required|min:3|max:225',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()->toArray(),
            ]);
        } else {
            $mesage = new Message();
            $mesage->name = $request->name . ' ' . $request->surname;
            $mesage->email = $request->email;
            $mesage->phone = $request->phone;
            $mesage->service = $request->service;
            $mesage->subject = $request->subject;
            $mesage->message = $request->message;

            $mesage->save();

            return response()->json([
                'status' => 1,
                'msg' => 'Message apply was successfully registered',
                'state' => 'Congratulations!',
            ]);
        }
    }

    public function settings()
    {
        $categories = ContactService::orderBy('title', 'desc')->get();
        $page_title = 'Messages';

        return view(
            'backend.contact-settings',
            compact('categories', 'page_title')
        );
    }

    public function createCategory(Request $request)
    {
        $request->validate([
            'inputCategory' => 'required|min:3|max:225',
        ]);

        $category = new ContactService();
        $category->title = $request->inputCategory;
        $category->save();

        toastr()->success(
            'Category was successfully registered',
            'Congratulations!!'
        );
        return redirect()->route('admin.messages.settings.index');
    }

    public function editCategory(Request $request)
    {
        $category = ContactService::find($request->id);
        return response()->json([
            'status' => 200,
            'data' => $category,
        ]);
    }

    public function updateCategory(Request $request)
    {
        $request->validate([
            'inputCategory2' => 'required|min:3|max:225',
        ]);

        $categories_id = $request->input('hiddenID');

        $category = ContactService::find($categories_id);
        $category->title = $request->inputCategory2;
        $category->update();

        toastr()->success(
            'Category has been successfully updated',
            'Congratulations!!'
        );
        return redirect()->route('admin.messages.settings.index');
    }

    public function deleteCategory($id)
    {
        $check = Message::where('service', $id)->count();

        if ($check > 0) {
            toastr()->error(
                'This category is used in the messages section',
                'Ooops!'
            );
            return redirect()->route('admin.messages.settings.index');
        } else {
            ContactService::where('id', $id)->delete();
            toastr()->success(
                'Category was successfully deleted',
                'Congratulations!'
            );
            return redirect()->route('admin.messages.settings.index');
        }
    }

    public function location(Request $request)
    {
        $branch = Branch::find($request->id);
        return response()->json([
            'status' => 200,
            'data' => $branch,
        ]);
    }

    public function showNotifications()
    {
        $notifications = Notification::all();
        $page_title = 'Notifications';

        return view('backend.notifications')->with([
            'notifications' => $notifications,
            'page_title' => $page_title
        ]);
    }

    public function addNotification(Request $request)
    {
        if ($request->image) {
            $file = $request->image;
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/images/static_images/', $name);
        } else {
            $name = 'notification.png';
        }

        $data = [
            'name' => $request->name,
            'message' => json_encode($request->message),
            'image' => $name,
        ];

        Notification::create($data);

        return Redirect::back()->with(
            'message',
            'Notification succesfully posted'
        );
    }

    public function disableNotification($id)
    {
        $data = [
            'status' => 0,
        ];

        Notification::where('id', $id)->update($data);

        return Redirect::back()->with(
            'message',
            'Notification disabled Succesfully'
        );
    }

    public function activateNotification($id)
    {
        $data = [
            'status' => 1,
        ];

        Notification::where('id', $id)->update($data);

        return Redirect::back()->with(
            'message',
            'Notification activated Succesfully'
        );
    }

    public function editNotification(Request $request)
    {
        if ($request->image) {
            $file = $request->image;
            $image = $file->getClientOriginalName();
            $file->move(public_path() . '/images/static_images/', $image);
        } else {
            $image = 'notification.png';
        }

        Notification::where('id', $request->notification_id)->update([
            'name' => $request->name,
            'message' => json_encode($request->message),
            'image' => $image,
        ]);

        return Redirect::back()->with(
            'message',
            'Notification updated successfully'
        );
    }

    public function deleteNotification($id)
    {
        Notification::where('id', $id)->delete();

        return Redirect::back()->with(
            'message',
            'Notification deleted Succesfully'
        );
    }

    public function support()
    {
        $support_demands = Support_demand::all();
        $page_title = "Support";

        return view('backend.public.support', compact('support_demands' , 'page_title'));
    }

    public function support_message(Request $request)
    {
        $demand_data = [
            'status' => $request->status,
        ];
        $demand = Support_demand::where('id', $request->id)->first();
        $message_data = [
            'by' => 'moderator',
            'support_id' => $request->id,
            'user_id' => $demand->user_id,
            'moderator_id' => Auth::user()->id,
            'message' => json_encode($request->message),
        ];

        Support_demand::where('id', $request->id)->update($demand_data);
        Support_message::create($message_data);

        $user = UserModel::where('id', $demand->user_id)->first();
        $email_data = [
            'name' => $user->name,
            'email' => $user->email,
            'mod_text' => json_encode($request->message),
        ];
        Mail::send('backend.mails.supportmail', $email_data, function (
            $message
        ) use ($email_data) {
            $message
                ->to($email_data['email'], $email_data['name'])
                ->subject('ShipLounge , Support notification')
                ->from('noreply@shiplounge.co', 'ShipLounge');
        });

        return response()->json(
            'Reply for support demand has been sent succesfully'
        );
    }

    public function show_support_chat(Request $request)
    {
        $demand = Support_demand::where('id', $request->id)->first();
        $messages = Support_message::where('support_id', $demand->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return response()->json([
            'demand' => $demand,
            'messages' => $messages,
        ]);
    }

    public function sendMessage(Request $request)
    {
        // dd($request->all());

        $demand_data = [
            'status' => $request->status,
        ];
        $demand = Support_demand::where('id', $request->id)->first();
        $message_data = [
            'by' => 'moderator',
            'support_id' => $request->id,
            'user_id' => $demand->user_id,
            'moderator_id' => Auth::user()->id,
            'message' => json_encode($request->message),
        ];

        Support_demand::where('id', $request->id)->update($demand_data);
        Support_message::create($message_data);

        $user = UserModel::where('id', $demand->user_id)->first();
        $email_data = [
            'name' => $user->name,
            'email' => $user->email,
            'mod_text' => json_encode($request->message),
        ];
        Mail::send('backend.mails.supportmail', $email_data, function (
            $message
        ) use ($email_data) {
            $message
                ->to($email_data['email'], $email_data['name'])
                ->subject('ShipLounge , Support notification')
                ->from('noreply@shiplounge.co', 'ShipLounge');
        });

        return response()->json(
            'Reply for support demand has been sent succesfully'
        );
    }

    public function usages()
    {
        $usages = Usage::all();
        $page_title = "Usage Blogs";

        return view('backend.helpers.siteusage')->with([
            'usages' => $usages,
            'page_title' => $page_title
        ]);
    }

    public function addUsage(Request $request)
    {
        if ($request->image) {
            $file = $request->image;
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/images/static_images/', $name);
        } else {
            $name = 'usage.png';
        }

        $data = [
            'title' => $request->title,
            'link' => $request->link,
            'description' => json_encode($request->description),
            'image' => $name,
        ];

        Usage::create($data);

        return Redirect::back()->with(
            'message',
            'Notification succesfully posted'
        );
    }

    public function disableUsage($id)
    {
        $data = [
            'status' => 0,
        ];

        Usage::where('id', $id)->update($data);

        return Redirect::back()->with(
            'message',
            'Notification disabled Succesfully'
        );
    }

    public function activateUsage($id)
    {
        $data = [
            'status' => 1,
        ];

        Usage::where('id', $id)->update($data);

        return Redirect::back()->with(
            'message',
            'Notification activated Succesfully'
        );
    }

    public function editUsage(Request $request)
    {
        if ($request->image) {
            $file = $request->image;
            $image = $file->getClientOriginalName();
            $file->move(public_path() . '/images/static_images/', $image);
        } else {
            $image = 'usage.png';
        }

        Usage::where('id', $request->usage_id)->update([
            'title' => $request->title,
            'description' => json_encode($request->description),
            'link' => $request->link,
            'image' => $image,
        ]);

        return Redirect::back()->with(
            'message',
            'Notification updated successfully'
        );
    }

    public function deleteUsage($id)
    {
        Usage::where('id', $id)->delete();

        return Redirect::back()->with(
            'message',
            'Notification deleted Succesfully'
        );
    }
}

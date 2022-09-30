<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Packing;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        $page_title = 'Dashboard';

        return view('backend.dashboard', compact('page_title'));
    }

    public function profile()
    {
        $page_title = 'Profile';

        return view('backend.profile', compact('page_title'));
    }

    public function updateprofile(Request $request)
    {
        $request->request->remove('_token');
        $input = collect(request()->all())
            ->filter(function ($value) {
                return null !== $value;
            })
            ->toArray();

        UserModel::where('id', Auth::user()->id)->update($input);

        return Redirect::back()->with(
            'message',
            'Profile successfully updated'
        );
    }

    public function updateimage(Request $request)
    {
        $filename =
            time() .
            '.' .
            request()
                ->file('image')
                ->getClientOriginalExtension();
        request()->image->move(public_path('images'), $filename);

        // dd($filename , $request->all());

        UserModel::where('id', Auth::user()->id)->update([
            'image' => $filename,
        ]);

        return Redirect::back()->with(
            'message',
            'Profile Image successfully updated'
        );
    }

    public function packing_index()
    {
        $packings = Packing::all();
        $page_title = 'Packings';

        return view(
            'backend.helpers.packing',
            compact('packings', 'page_title')
        );
    }

    public function packing_add_new(Request $request)
    {
        $data = [
            'value' => $request->value,
            'price' => $request->price,
            'details' => json_encode($request->details),
        ];

        Packing::create($data);

        return Redirect::back()->with('message', 'Packing created succesfully');
    }

    public function packing_edit(Request $request)
    {
        $id = $request->packing_id;
        $request->request->remove('_token');
        $request->request->remove('packing_id');

        $data = collect(request()->all())
            ->filter(function ($value) {
                return null !== $value;
            })
            ->toArray();

        Packing::where('id', $id)->update($data);

        return Redirect::back()->with('message', 'Packing updated succesfully');
    }

    public function packing_delete($id)
    {
        Packing::where('id', $id)->delete();

        return Redirect::back()->with('message', 'Packing deleted succesfully');
    }

    public function settings()
    {
        $settings = Setting::all();
        $sliders = Slider::all();
        $page_title = 'Settings';

        return view(
            'backend.helpers.settings',
            compact('settings', 'sliders', 'page_title')
        );
    }

    public function add_settings(Request $request)
    {
        $data = [
            'name' => $request->name,
            'page' => $request->page,
            'text' => $request->text,
            'details' => json_encode($request->details),
        ];
        Setting::create($data);

        return Redirect::back()->with(
            'message',
            'New Setting added successfully'
        );
    }

    public function edit_settings(Request $request)
    {
        $data = [
            'name' => $request->name,
            'page' => $request->page,
            'text' => $request->text,
            'details' => json_encode($request->details),
        ];
        Setting::where('id', $request->id)->update($data);

        return Redirect::back()->with(
            'message',
            'Setting updated successfully'
        );
    }

    public function delete_settings($id)
    {
        Setting::where('id', $id)->delete();
        return Redirect::back()->with(
            'message',
            'Setting deleted successfully'
        );
    }

    public function add_slider(Request $request)
    {
        if (request()->file('image')) {
            $filename = $request->title.'_'.time().'.'.request()->file('image')->getClientOriginalExtension();
            request()->image->move(public_path('backend/assets/img/slider'), $filename);
        }
        $data = array(
            'title' => $request->title,
            'text' => $request->text,
            'image' => $filename,
            'main' => 'false'
        );
        Slider::create($data);

        return Redirect::back()->with(
            'message',
            'New Slider Page added successfully'
        );
    }

    public function edit_slider(Request $request)
    {
        // dd($request->all());

        if (request()->file('image')) {
            $filename = $request->title.'_'.time().'.'.request()->file('image')->getClientOriginalExtension();
            request()->image->move(public_path('backend/assets/img/slider'), $filename);

            $data = array(
                'title' => $request->title,
                'text' => $request->text,
                'image' => $filename
            );
        }else{
            $data = array(
                'title' => $request->title,
                'text' => $request->text
            );
        }

        Slider::where('id' , $request->id)->update($data);

        return Redirect::back()->with(
            'message',
            'Slider Page updated successfully'
        );
    }

    public function delete_slider($id){
        Slider::where('id' , $id)->delete();

        return Redirect::back()->with(
            'message',
            'Slider Page deleted successfully'
        );
    }

    public function activate_slider($id){

        $data = array(
            'main' => 'true'
        );
        $sliders = Slider::all();
        foreach ($sliders as $slider) {
            Slider::where('id' , $slider->id)->update(['main' => 'false']);
        }
        Slider::where('id' , $id)->update($data);

        return Redirect::back()->with(
            'message',
            'Slider Page Activated successfully'
        );
    }
}

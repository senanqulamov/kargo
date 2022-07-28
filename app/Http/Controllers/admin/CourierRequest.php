<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Courier_request;
use App\Models\Order_time;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CourierRequest extends Controller
{
    public function courier_requests()
    {

        $courier_requests = Courier_request::all();

        return view('backend.courier_request')->with([
            'courier_requests' => $courier_requests
        ]);
    }

    public function update_courier_request(Request $request)
    {

        $data = array();
        $id = $request->id;

        $request->request->remove('_token');
        $request->request->remove('id');
        $data = collect(request()->all())->filter(function ($value) {
            return null !== $value;
        })->toArray();

        $data['orders'] = json_encode($request->order_ids);
        $data['user_id'] = Auth::user()->id;
        unset($data['order_ids']);

        Courier_request::where('id', $id)->update($data);

        return Redirect::back()->with('message', 'Courier Request updated succesfully');
    }

    public function status_courier_request(Request $request)
    {

        $data = array(
            'status' => $request->status,
            'comment' => $request->comment
        );

        Courier_request::where('id', $request->id)->update($data);
        if ($request->status == 'accepted') {
            $message = "Courier request accepted Succesfully !";

            $courier_requests = Courier_request::where('id', $request->id)->first();
            $orders = json_decode($courier_requests->orders);
            foreach ($orders as $order) {
                $time_data = array(
                    'cargo_id' => $order,
                    'user_id' => Auth::user()->id,
                    'action' => 'Courier request accepted',
                    'time' => Carbon::now()
                );
                Order_time::create($time_data);
            }
        } else {
            $message = "Courier request cancelled !";

            $courier_requests = Courier_request::where('id', $request->id)->first();
            $orders = json_decode($courier_requests->orders);
            foreach ($orders as $order) {
                $time_data = array(
                    'cargo_id' => $order,
                    'user_id' => Auth::user()->id,
                    'action' => 'Courier request denied',
                    'time' => Carbon::now()
                );
                Order_time::create($time_data);
            }
        }

        return response()->json($message);
    }

    public function myorders()
    {
        $courier_requests = Courier_request::where([
            ['courier_id', Auth::user()->id],
            ['status', 'accepted']
        ])->get();

        return view('backend.helpers.myorders')->with([
            'courier_requests' => $courier_requests
        ]);
    }
}

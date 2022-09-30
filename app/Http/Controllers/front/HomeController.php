<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\AdditionalService;
use App\Models\Cargo_request;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Branch;

use App\Models\Country;
use App\Models\Faqs;
use App\Models\FaqsCategory;
use App\Models\Packing;
use App\Models\Slider;
use App\Models\User as UserModel;

class HomeController extends Controller
{
    // index section
    public function index()
    {
        $cargo_request_count = Cargo_request::whereIn('status', [
            3,
            4,
            7,
        ])->count();
        $country_count = count(
            array_unique(
                Cargo_request::all()
                    ->pluck('country')
                    ->toArray()
            )
        );
        $customer_count = User::whereIsAdmin(0)
            ->whereIsBanned(0)
            ->whereUserRole(0)
            ->count();
        $locations = Branch::all();
        $packings = Packing::all();

        $countries = Country::orderBy('name', 'asc')->get();
        $slider = Slider::all();

        return view(
            'frontend.index',
            compact(
                'countries',
                'cargo_request_count',
                'country_count',
                'customer_count',
                'locations',
                'packings',
                'slider'
            )
        );
    }

    public function ecommerce()
    {
        return view('frontend.e-commerce');
    }

    public function fba()
    {
        $services = AdditionalService::all();
        return view('frontend.fba', compact('services'));
    }

    public function marketplace()
    {
        return view('frontend.marketplace');
    }

    public function export()
    {
        return view('frontend.e-export');
    }

    public function servicesFee()
    {
        $faqs = Faqs::all();
        $categories = FaqsCategory::all();
        return view('frontend.service-fee', compact('faqs', 'categories'));
    }

    public function getquote()
    {
        return view('frontend.getquote');
    }

    public function service()
    {
        $faqs = Faqs::all();
        $categories = FaqsCategory::all();
        return view('frontend.service-fee', compact('faqs', 'categories'));
    }

    public function membershifee()
    {
        return view('frontend.membershifee');
    }

    public function track()
    {
        return view('frontend.track');
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function register()
    {
        $users = UserModel::all();

        $countries = Country::all();

        return view('frontend.register')->with([
            'users' => $users,
            'countries' => $countries,
        ]);
    }
}

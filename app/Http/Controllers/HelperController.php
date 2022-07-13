<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cargo_document;
use App\Models\Cargo_request;
use App\Models\Package;
use App\Models\Product;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use stdClass;

class HelperController extends Controller
{

    public function calculator($cargo_id)
    {

        $packages = Package::where('cargo_id', $cargo_id)->get();
        $cargo = Cargo_request::where('id', $cargo_id)->get()->first();

        // dd($cargo , $cargo_id);
        $total_volume = 0;
        $total_weight = 0;
        $total_count = 0;
        $total_price = 0;
        $total_deci = 0;
        $total_product_count = 0;
        $total_box_count = 0;

        foreach ($packages as $key => $value) {
            if ($value->n_package_width && $value->n_package_length && $value->n_package_height && $value->n_package_weight) {
                $total_volume += $value->n_package_length * $value->n_package_width * $value->n_package_height * $value->package_count;
                $total_weight += $value->n_package_weight * $value->package_count;
                $total_deci += max($total_volume / 5000, $total_weight);
            } else {
                $total_volume += $value->package_length * $value->package_width * $value->package_height * $value->package_count;
                $total_weight += $value->package_weight * $value->package_count;
                $total_deci += max($total_volume / 5000, $total_weight);
            }
            $products = Product::where('package_id', $value->id)->get();
            // dd($products);
            $product_total_price = 0;
            $product_total_count = 0;
            foreach ($products as $product) {
                $product_total_price += $product->price * $product->count;
                $product_total_count += $product->count;
            }
            $total_count += $product_total_count * $value->package_count;
            $total_price += $product_total_price * $value->package_count;

            $total_box_count += $value->package_count;
            $total_product_count += $product_total_count;
        }

        Cargo_request::where('id', $cargo_id)->update([
            'total_volume' => $total_volume,
            'total_weight' => $total_weight,
            'total_count' => $total_count,
            'total_deci' => $total_deci,
            'total_worth' => $total_price
        ]);

        $data = new stdClass();
        $data->total_deci = $total_deci;
        $data->total_volume = $total_volume;
        $data->total_weight = $total_weight;
        $data->total_count = $total_count;
        $data->total_worth = $total_price;
        $data->total_product_count = $total_product_count;
        $data->total_box_count = $total_box_count;
        $data->country = $cargo->country;


        $company_values = $this->CalculateCompany($data);
        $service_values = $this->CalculateServices($data);

        $result = new stdClass();
        $result->cargo_id = $cargo_id;
        $result->totals = $data;
        $result->companies = $company_values;
        $result->services = $service_values;

        return $result;
    }

    public function CalculateCompany($data)
    {

        $deci = DB::table('cargo_zones')->select('companyID', 'zone')->where('desi', $data->total_deci)->get();
        $zone = DB::table('cargo_countries')->where('country', $data->country)->get()->first();

        $result_array = array();
        foreach ($deci as $deci) {
            $deci_zone_values =  json_decode($deci->zone);
            $deci_company = $deci->companyID;
            $deci_zone_value = $deci_zone_values[$zone->zone - 1];
            $company = DB::table('cargo_companies')->where('id', $deci_company)->get()->first();

            $psh = ($deci_zone_value * $company->PSH) / 100;
            $jet = ($deci_zone_value * $company->jet_price) / 100;
            $emergency = ($deci_zone_value * $company->emergency) / 100;
            $kar_marj = ($deci_zone_value * $company->kar_marj) / 100;
            $deci_zone_value = $deci_zone_value + $psh + $jet + $emergency + $kar_marj;

            $result = array($deci->companyID => $deci_zone_value);
            $result_array += $result;
        }

        return $result_array;
    }

    public function CalculateServices($data)
    {
        $services = DB::table('additional_services')->get();
        $services_array = [];

        foreach ($services as $service) {
            switch ($service->status) {
                case '1':
                    $price = $service->price * $data->total_deci;
                    $services_array += array($service->slug => $price);
                    break;
                case '2':
                    $price = $service->price * $data->total_box_count;
                    $services_array += array($service->slug => $price);
                    break;
                case '3':
                    $price = $service->price * $data->total_product_count;
                    $services_array += array($service->slug => $price);
                    break;
                case '4':
                    $price = $service->price * $data->total_weight;
                    $services_array += array($service->slug => $price);
                    break;
                case '5':
                    $price = $service->price * $data->total_volume;
                    $services_array += array($service->slug => $price);
                    break;
                case '6':
                    $price = $service->price * $data->total_worth;
                    $services_array += array($service->slug => $price);
                    break;
                default:
                    $price = $service->price;
                    $services_array += array($service->slug => $price);
                    break;
            }
        }

        return $services_array;
    }

    public function calculateTotalCargoPrice($result){

        $total_cargo_price =0;
        $cargo = Cargo_request::where('id' , $result->cargo_id)->get()->first();
        if(isset($result->companies[$cargo->cargo_company])){
            $company_price = $result->companies[$cargo->cargo_company];
        }else{
            $company_price = 0;
        }

        $services = json_decode($cargo->additional_services);
        $services_price = 0;

        foreach ($services as $key => $value) {
            $services_price += $services->$key;
        }
        $total_cargo_price = $services_price + $company_price;


        return $total_cargo_price;
    }
}

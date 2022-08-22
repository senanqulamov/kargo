<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\CargoCountry;
use App\Models\CargoZone;
use App\Models\CargoCompany;
use stdClass;
use Validator;
use DB;

class PriceCalculationController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('name', 'asc')->get();
        $cargo_companies = DB::table('cargo_companies')->get();
        return view('frontend.pricecalculator', compact('countries' , 'cargo_companies'));
    }

    public function calculation(Request $request)
    {

        $price = array();
        $company = array();

        $validator = Validator::make($request->all(), [
            'selectCountry' => 'required',
            'inputCount' => 'numeric|not_in:0',
            'selectType' => 'required',
            'inputLength' => 'required|numeric',
            'inputWidth' => 'required|numeric',
            'inputHeight' => 'required_if:selectType,==,box',
            'inputWeight' => 'required|numeric',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $data = new stdClass();
            $data->total_deci = $request->total_desi;
            $data->country = $request->selectCountry;

            // dd($data , $request->all());

            $result = (new HelperController)->CalculateCompany($data);

            // $totalDesi=$this->totalDesi($request->inputWeight, $request->inputWidth, $request->inputHeight, $request->inputLength, $request->inputCount);

            // $totalZone=$this->totalZone($request->selectCountry);

            // $totalCompany=$this->totalCompany($request->selectCountry);

            // for ($i=0; $i < count($totalCompany); $i++) {
            //     $query=CargoZone::where('companyID', $totalCompany[$i])->where('desi', $totalDesi)->first();
            //     $query=json_decode($query->zone, true);
            //     array_push($price, $query[$totalZone[$i]-1]);
            // }

            // for ($m=0; $m < count($totalCompany); $m++) {
            //     $company_data=CargoCompany::where('id', $totalCompany[$m])->first();
            //     array_push($company, $company_data->name);
            // }

            return response()->json($result);
        }
    }

    public function totalDesi($weight, $width, $height = 1, $length, $count = 1)
    {
        return $calc = round($weight, ($count * ($width * $height * $length) / 5000));
    }

    public function totalZone($country)
    {
        $quiry = Country::where('code', $country)->first();

        $search = CargoCountry::where('country', $quiry->name)->get();

        $zone = array();

        foreach ($search as $item) {
            array_push($zone, $item->zone);
        }

        return $zone;
    }

    public function totalCompany($country)
    {
        $quiry = Country::where('code', $country)->first();

        $search = CargoCountry::where('country', $quiry->name)->get();

        $company = array();

        foreach ($search as $item) {
            array_push($company, $item->companyID);
        }

        return $company;
    }
}

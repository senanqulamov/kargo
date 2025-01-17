<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AmazonAddress;
use Illuminate\Http\Request;

use App\Models\CargoCompany;
use App\Models\CargoCountry;
use App\Models\CargoZone;
use Illuminate\Support\Str;

use File;
use Illuminate\Support\Facades\Redirect;
use Validator;

use Shuchkin\SimpleXLSX;

class CargoCompanyController extends Controller
{
    public function index()
    {
        $cargos = CargoCompany::orderBy('created_at', 'desc')->get();
        $page_title = "Cargo Companies";

        return view('backend.cargo-company', compact('cargos' , 'page_title'));
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'inputName' => 'required|min:3|max:225',
            'inputApi' => 'required|min:3|max:225',
            'inputPrivate' => 'required|min:3|max:225',
            'fileLogo' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:10000'
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $entegration = array();
            array_push($entegration, $request->inputApi);
            array_push($entegration, $request->inputPrivate);

            $cargo = new CargoCompany;
            $cargo->name = $request->inputName;
            $cargo->slug = Str::slug($request->inputName, '-');

            if ($request->hasFile('fileLogo')) {
                $image = time() . '.' . $request->fileLogo->extension();
                $request->fileLogo->move(public_path('backend/assets/img/companies/cargo'), $image);
                $cargo->logo = $image;
            }

            $cargo->description = $request->description;
            $cargo->PSH = $request->PSH;
            $cargo->jet_price = $request->jet_price;
            $cargo->emergency = $request->emergency;
            $cargo->kar_marj = $request->kar_marj;

            $cargo->entegrations = json_encode($entegration);
            $cargo->save();

            return response()->json(['status' => 1, 'msg' => 'Cargo company  was successfully registered', 'state' => 'Congratulations!']);
        }
    }

    public function edit(Request $request)
    {
        $cargo = CargoCompany::find($request->id);

        return response()->json([
            'status' => 200,
            'data' => $cargo,
        ]);
    }

    public function update(Request $request)
    {
        $entegration = array();
        array_push($entegration, $request->inputApi2);
        array_push($entegration, $request->inputPrivate2);

        $faqs_id = $request->input('hiddenID');

        $cargo = CargoCompany::find($faqs_id);
        $cargo->name = $request->name;
        $cargo->slug = Str::slug($request->name, '-');

        if ($request->file('file')) {
            File::delete('backend/assets/img/companies/cargo/' . $cargo->logo);
            $image = time() . '.' . $request->file->extension();
            $request->file->move(public_path('backend/assets/img/companies/cargo'), $image);
            $cargo->logo = $image;
        }

        $cargo->description = $request->description;
        $cargo->PSH = $request->PSH;
        $cargo->jet_price = $request->jet_price;
        $cargo->emergency = $request->emergency;
        $cargo->kar_marj = $request->kar_marj;

        $cargo->entegrations = json_encode($entegration);
        $cargo->update();

        return Redirect::back()->with('message', 'Cargo company has been successfully updated');
    }

    public function delete($id)
    {

        $image = CargoCompany::findOrFail($id);
        File::delete('backend/assets/img/companies/cargo/' . $image->logo);

        CargoCompany::where('id', $id)->delete();
        toastr()->success('Cargo company was successfully deleted', 'Congratulations!');
        return redirect()->route('admin.companies.cargo');
    }

    public function upload(Request $request)
    {
        $count_country = array();

        $validator = Validator::make($request->all(), [
            'fileExcel' => 'required|max:50000|mimes:xlsx,xls',
            'fileZone' => 'required|max:50000|mimes:xlsx,xls',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            if ($request->hasFile('fileExcel')) {
                $excel = time() . '.' . $request->fileExcel->extension();
                $pathExcel = $request->fileExcel->move(public_path('backend/document/cargo'), $excel);

                if ($xlsxExcel = SimpleXLSX::parse($pathExcel)) {
                    for ($i = 1; $i < count($xlsxExcel->rows()); $i++) {
                        array_push($count_country, $xlsxExcel->rows()[$i][1]);

                        $cargo_country = new CargoCountry;
                        $cargo_country->companyID = $request->inputHiddenExcel;
                        $cargo_country->country = $xlsxExcel->rows()[$i][0];
                        $cargo_country->zone = $xlsxExcel->rows()[$i][1];
                        $cargo_country->save();
                    }
                } else {
                    echo SimpleXLSX::parseError();
                }
            }

            $max_zone = max($count_country) + 1;

            if ($request->hasFile('fileZone')) {
                $zone = time() . '.' . $request->fileZone->extension();
                $pathZone = $request->fileZone->move(public_path('backend/document/cargo'), $zone);

                if ($xlsxZone = SimpleXLSX::parse($pathZone)) {
                    for ($i = 1; $i < count($xlsxZone->rows()); $i++) {

                        ini_set('max_execution_time', 0);

                        $cargo_zone = new CargoZone;
                        $cargo_zone->companyID = $request->inputHiddenExcel;
                        $cargo_zone->desi = $xlsxZone->rows()[$i][0];

                        $zoneArray = array();
                        for ($z = 1; $z < $max_zone; $z++) {
                            array_push($zoneArray, $xlsxZone->rows()[$i][$z]);
                        }
                        $cargo_zone->zone = json_encode($zoneArray);
                        unset($zoneArray);

                        $cargo_zone->save();
                    }
                } else {
                    echo SimpleXLSX::parseError();
                }
            }

            return response()->json(['status' => 1, 'msg' => 'Cargo datas was successfully inserted', 'state' => 'Congratulations!']);
        }
    }

    public function downloadList()
    {
        $path = public_path('backend/document/template/liste.xlsx');
        return response()->download($path);
    }

    public function downloadZone()
    {
        $path = public_path('backend/document/template/zone.xlsx');
        return response()->download($path);
    }

    public function personal_cargo(){

        $personal_cargo = CargoZone::where('user_id' , '!=' , 'null')->orderBy('id' , 'DESC')->get();
        $page_title = "Personal Cargo";

        return view('backend.helpers.personal_cargo' , compact('personal_cargo' , 'page_title'));
    }

    public function create_personal_cargo(Request $request){

        // dd($request->all());

        $excel = SimpleXLSX::parse($request->zone);

        $test_data = [];
        for ($i=0; $i < count($excel->rows()); $i++) {
            $data = array(
                'user_id' => $request->user,
                'companyID' => $request->company,
                'personal_name' => $request->personal_name,
                'desi' => $excel->rows()[$i][0],
                'zone' => $excel->rows()[$i][1]
            );
            $test_data[] = $data;
            CargoZone::create($data);
        }

        // dd($test_data);

        return Redirect::back()->with('message' , 'Personal cargo created succesfully');
    }

    public function amazon_addresses(){

        // dd(AmazonAddress::all());
        $amazon_addresses = AmazonAddress::all();
        $page_title = "Amazon Addresses";

        return view('backend.helpers.amazon_addresses' , compact('amazon_addresses' , 'page_title'));
    }
    public function amazon_addresses_create(Request $request){

        AmazonAddress::create($request->all());

        return Redirect::back()->with('message' , 'New address has been created succesfully');

    }

    public function amazon_addresses_update(Request $request,AmazonAddress $amazon_address){

        $request = $request->all();
        $amazon_address->update($request);

        return Redirect::back()->with('message' , 'New address has been updated succesfully');
    }

    public function amazon_addresses_delete(AmazonAddress $amazon_address){
        $amazon_address->delete();

        return Redirect::back()->with('message' , 'New address has been updated succesfully');
    }



}

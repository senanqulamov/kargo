<?php

namespace App\Http\Controllers\userpanel;

use App\Models\User as UserModel;
use App\Http\Controllers\Controller;
use App\Models\AdditionalService;
use App\Models\Cargo_document;
use App\Models\Cargo_request;
use App\Models\CargoCompany;
use App\Models\CargoZone;
use App\Models\MoneyBackRequest;
use App\Models\Notification;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Product;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use PDF;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Str;
use Picqer\Barcode;
use Picqer\Barcode\BarcodeGeneratorPNG;

class UserPanelHelper extends Controller
{
    public function showNotifications(){
        $notifications = Notification::where('status' , 1)->get();

        return $notifications;
    }
}

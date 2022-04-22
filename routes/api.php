<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\UserAddressController;

use App\Http\Controllers\api\ManuelOrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// manuel order
Route::get('/manuel-order', [ManuelOrderController::class, 'index']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::resource('/address', UserAddressController::class);    
});
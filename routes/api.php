<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\UserAddressController;

use App\Http\Controllers\api\ManuelOrderController;

use App\Http\Controllers\TestController;

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

Route::post('/test', [TestController::class, 'index']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);








// manuel order
Route::get('/manuel-order', [ManuelOrderController::class, 'index']);

// address 
Route::prefix('address')->group(function(){
    Route::post('/create', [UserAddressController::class, 'create']); 
    Route::post('/delete/{id}', [UserAddressController::class, 'delete']); 
});

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/logout', [AuthController::class, 'logout']);

    /*
    // manuel order
    Route::get('/manuel-order', [ManuelOrderController::class, 'index']);

    // address 
    Route::prefix('address')->group(function(){
        Route::get('/', [UserAddressController::class, 'index']);  
        Route::post('/create', [UserAddressController::class, 'create']); 
        Route::post('/delete/{id}', [UserAddressController::class, 'delete']); 
    });
    */
});
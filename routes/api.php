<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\UserAddressController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\PackageController;

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

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/logout', [AuthController::class, 'logout']);
    
    // order
    Route::prefix('orders/')->name('orders.')->group(function(){
        Route::resource('/address', UserAddressController::class);
        Route::get('/manuel', [UserController::class, 'index'])->name('manuel');
        Route::get('/bulk', [UserController::class, 'index'])->name('bulk');
    });	

    // manuel order
    Route::resources([
        'package' => PackageController::class,
        'products' => ProductController::class,
    ]);
});




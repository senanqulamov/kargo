<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\front\HomeController;

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// front section
Route::get('/', [HomeController::class, 'index'])->name('index');

// admin section
Route::prefix('admin')->name('admin.')->group(function(){
	
	Route::middleware('isLogin')->group(function(){
		// login
		Route::get('/', [AuthController::class, 'index'])->name('index');
		Route::post('/', [AuthController::class, 'postIndex'])->name('postIndex');
	});

	Route::middleware('notLogin')->group(function(){
		// dashboard
		Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
		Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

		// profile
		Route::get('/profile', [AdminController::class, 'profile'])->name('profile');

		// users
		Route::get('/users', [UserController::class, 'index'])->name('users');
		Route::get('/users/{id}', [UserController::class, 'details'])->name('users.details');

		// order
		Route::prefix('orders/')->name('orders.')->group(function(){
			Route::get('/manuel', [UserController::class, 'index'])->name('manuel');
			Route::get('/bulk', [UserController::class, 'index'])->name('bulk');
		});		
	});    
});

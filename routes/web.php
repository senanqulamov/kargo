<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\front\HomeController;

use App\Http\Controllers\admin\{
	AuthController,
	AdminController,
	UserController,
	ManuelOrderController,
	FaqsController,
	BranchController,
	CargoController,
	WarehouseController,
};

use App\Http\Controllers\MessageController;

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
			Route::get('/manuel', [ManuelOrderController::class, 'index'])->name('manuel');
			Route::get('/bulk', [UserController::class, 'index'])->name('bulk');
		});
		
		// messages
		Route::prefix('messages/')->name('messages.')->group(function(){
			Route::get('/inbox', [MessageController::class, 'inbox'])->name('inbox');
			Route::get('/read/{id}', [MessageController::class, 'read'])->name('read');
			Route::get('/delete/{id}', [MessageController::class, 'delete'])->name('delete');
		});	

		//faqs
		Route::prefix('faqs')->name('faqs.')->group(function(){
			Route::get('/', [FaqsController::class, 'index'])->name('index');
			Route::post('/create', [FaqsController::class, 'create'])->name('create');
			Route::get('/edit/{id}', [FaqsController::class, 'edit']);
			Route::put('/update', [FaqsController::class, 'update'])->name('update');
			Route::get('/delete/{id}', [FaqsController::class, 'delete'])->name('delete');
		});

		// cargo
		Route::prefix('cargos/')->name('cargos.')->group(function(){
			Route::get('/company', [CargoController::class, 'company'])->name('company');
			Route::get('/company/delete/{id}', [CargoController::class, 'delete'])->name('company.delete');

			Route::get('/domestic', [CargoController::class, 'domestic'])->name('domestic');
			Route::get('/domestic/delete/{id}', [CargoController::class, 'delete'])->name('domestic.delete');
		});	

		// branch
		Route::prefix('branches/')->name('branches.')->group(function(){
			Route::get('/', [BranchController::class, 'index'])->name('index');
			Route::post('/create', [BranchController::class, 'create'])->name('create');
			Route::get('/edit/{id}', [BranchController::class, 'edit']);
			Route::put('/update', [BranchController::class, 'update'])->name('update');
			Route::get('/delete/{id}', [BranchController::class, 'delete'])->name('delete');
		});	

		// warehouses
		Route::prefix('warehouses/')->name('warehouses.')->group(function(){
			Route::get('/', [WarehouseController::class, 'index'])->name('index');
			Route::get('/delete/{id}', [WarehouseController::class, 'delete'])->name('delete');
		});
	});    
});

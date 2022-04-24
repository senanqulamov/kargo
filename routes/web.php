<?php

use Illuminate\Support\Facades\Route;

// home
use App\Http\Controllers\front\HomeController;

// backend
use App\Http\Controllers\admin\{
	AuthController,
	AdminController,
	UserController,
	ManuelOrderController,
	FaqsController,
	BranchController,
	CargoCompanyController,
	DomesticCompanyController,
	WarehouseController,
	AdditionalServiceController,
};
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TestController;

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
Route::get('/faqs', [HomeController::class, 'faqs'])->name('faqs');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::post('/test', [TestController::class, 'index']);

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
		Route::prefix('faqs/')->name('faqs.')->group(function(){
			Route::get('/', [FaqsController::class, 'index'])->name('index');
			Route::post('/create', [FaqsController::class, 'create'])->name('create');
			Route::get('/edit', [FaqsController::class, 'edit'])->name('edit');
			Route::put('/update', [FaqsController::class, 'update'])->name('update');
			Route::get('/delete/{id}', [FaqsController::class, 'delete'])->name('delete');
			
			Route::prefix('categories/')->name('categories.')->group(function(){
				Route::get('/', [FaqsController::class, 'categories'])->name('index');
				Route::post('/create', [FaqsController::class, 'createCategory'])->name('create');
				Route::get('/edit', [FaqsController::class, 'editCategory'])->name('edit');
				Route::put('/update', [FaqsController::class, 'updateCategory'])->name('update');
				Route::get('/delete/{id}', [FaqsController::class, 'deleteCategory'])->name('delete');
			});
		});

		// cargo
		Route::prefix('companies/')->name('companies.')->group(function(){
			Route::get('/cargo', [CargoCompanyController::class, 'index'])->name('cargo');
			Route::post('/cargo/create', [CargoCompanyController::class, 'create'])->name('cargo.create');
			Route::get('/cargo/edit', [CargoCompanyController::class, 'edit'])->name('cargo.edit');
			Route::put('/cargo/update', [CargoCompanyController::class, 'update'])->name('cargo.update');
			Route::get('/cargo/delete/{id}', [CargoCompanyController::class, 'delete'])->name('cargo.delete');
			Route::post('/cargo/upload', [CargoCompanyController::class, 'upload'])->name('cargo.upload');

			Route::get('/domestic', [DomesticCompanyController::class, 'index'])->name('domestic');
			Route::get('/domestic/delete/{id}', [DomesticCompanyController::class, 'delete'])->name('domestic.delete');
		});	

		// branch
		Route::prefix('branches/')->name('branches.')->group(function(){
			Route::get('/', [BranchController::class, 'index'])->name('index');
			Route::post('/create', [BranchController::class, 'create'])->name('create');
			Route::get('/edit', [BranchController::class, 'edit'])->name('edit');
			Route::put('/update', [BranchController::class, 'update'])->name('update');
			Route::get('/delete/{id}', [BranchController::class, 'delete'])->name('delete');
		});	

		// warehouses
		Route::prefix('warehouses/')->name('warehouses.')->group(function(){
			Route::get('/', [WarehouseController::class, 'index'])->name('index');
			Route::get('/delete/{id}', [WarehouseController::class, 'delete'])->name('delete');
		});

		// additional service
		Route::prefix('services/')->name('services.')->group(function(){
			Route::get('/', [AdditionalServiceController::class, 'index'])->name('index');
			Route::get('/delete/{id}', [AdditionalServiceController::class, 'delete'])->name('delete');
		});
	});    
});

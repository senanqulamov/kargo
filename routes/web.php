<?php

use Illuminate\Support\Facades\Route;

// home
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\UserAuth;

// backend
use App\Http\Controllers\admin\{
	AuthController,
	AdminController,
	UserController,
	ManuelOrderController,
	FaqsController,
	WardrobeController,
	ShelfController,
	BranchController,
	CargoCompanyController,
	DomesticCompanyController,
	WarehouseController,
	AdditionalServiceController,
};
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PriceCalculationController;
use App\Http\Controllers\CalculateController;
use App\Http\Controllers\BalanceController;


use App\Http\Controllers\userpanel\UserPanelController;

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
Route::post('/calculate', [CalculateController::class, 'index'])->name('index.calculate');


Route::get('/faqs', [FaqsController::class, 'indexFront'])->name('faqs');
Route::get('/e-commerce', [HomeController::class, 'ecommerce'])->name('e-commerce');
Route::get('/fba', [HomeController::class, 'fba'])->name('fba');
Route::get('/marketplace', [HomeController::class, 'marketplace'])->name('marketplace');
Route::get('/export', [HomeController::class, 'export'])->name('export');
Route::get('/servicesFee', [HomeController::class, 'servicesFee'])->name('servicesFee');
Route::get('/getquote', [HomeController::class, 'getquote'])->name('getquote');
Route::get('/service', [HomeController::class, 'servcice'])->name('servcice');
Route::get('/membershifee', [HomeController::class, 'membershifee'])->name('membershifee');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/track', [HomeController::class, 'track'])->name('track');


Route::get('/pricecalculator', [PriceCalculationController::class, 'index'])->name('pricecalculator');
Route::post('/pricecalculator', [PriceCalculationController::class, 'calculation'])->name('pricecalculator.calculation');

Route::get('/contact', [MessageController::class, 'indexFront'])->name('contact');
Route::post('/contact', [MessageController::class, 'indexFrontPost'])->name('contactPost');
Route::get('/contact/location', [MessageController::class, 'location'])->name('location');

Route::prefix('careers')->name('careers.')->group(function(){
	Route::get('/', [CareerController::class, 'index'])->name('index');
	Route::get('/fetch', [CareerController::class, 'fetch'])->name('fetch');
	Route::get('/apply/{id}', [CareerController::class, 'apply'])->name('apply');
	Route::post('/apply/{id}', [CareerController::class, 'postApply'])->name('postApply');
});

Route::prefix('blogs')->name('blogs.')->group(function(){
	Route::get('/', [BlogController::class, 'index'])->name('index');
	Route::get('/{slug}', [BlogController::class, 'detail'])->name('detail');
});

Route::get('generate', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});

// admin section
Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('/', [AuthController::class, 'index'])->name('index');
    Route::post('/', [AuthController::class, 'login'])->name('login');

	Route::middleware('AdminLogin')->group(function(){
		// dashboard
		Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
		Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

		// profile
		Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
		Route::post('/profile', [AdminController::class, 'postProfile'])->name('profile.post');

		// users
		Route::get('/users', [UserController::class, 'index'])->name('users');
		Route::get('/users/{id}', [UserController::class, 'details'])->name('users.details');
		Route::post('/users/update/general/{id}', [UserController::class, 'updateUserGeneral'])->name('users.general.update');
		Route::post('/users/update/password/{id}', [UserController::class, 'updateUserPassword'])->name('users.password.update');

		// order
		Route::prefix('orders/')->name('orders.')->group(function(){
			Route::get('/', [ManuelOrderController::class, 'index'])->name('index');
		});

		// messages
		Route::prefix('messages/')->name('messages.')->group(function(){
			Route::get('/inbox', [MessageController::class, 'inbox'])->name('inbox');
			Route::get('/sent', [MessageController::class, 'sent'])->name('sent');
			Route::get('/read/{id}', [MessageController::class, 'read'])->name('read');
			Route::get('/delete/{id}', [MessageController::class, 'delete'])->name('delete');
			Route::get('/compose', [MessageController::class, 'compose'])->name('compose');

			Route::prefix('/settings')->name('settings.')->group(function(){
				Route::get('/', [MessageController::class, 'settings'])->name('index');
				Route::post('/create', [MessageController::class, 'createCategory'])->name('create');
				Route::get('/edit', [MessageController::class, 'editCategory'])->name('edit');
				Route::put('/update', [MessageController::class, 'updateCategory'])->name('update');
				Route::get('/delete/{id}', [MessageController::class, 'deleteCategory'])->name('delete');
			});
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
			Route::get('/download/list', [CargoCompanyController::class, 'downloadList'])->name('cargo.download.list');
			Route::get('/download/zone', [CargoCompanyController::class, 'downloadZone'])->name('cargo.download.zone');

			Route::get('/domestic', [DomesticCompanyController::class, 'index'])->name('domestic');
			Route::post('/domestic/create', [DomesticCompanyController::class, 'create'])->name('domestic.create');
			Route::get('/domestic/edit', [DomesticCompanyController::class, 'edit'])->name('domestic.edit');
			Route::put('/domestic/update', [DomesticCompanyController::class, 'update'])->name('domestic.update');
			Route::get('/domestic/delete/{id}', [DomesticCompanyController::class, 'delete'])->name('domestic.delete');
		});

		// branch
		Route::prefix('branches/')->name('branches.')->group(function(){
			Route::get('/index', [BranchController::class, 'index'])->name('index');
			Route::get('/create', [BranchController::class, 'create'])->name('create');
			Route::post('/create', [BranchController::class, 'createPost'])->name('create.post');
			Route::get('/edit', [BranchController::class, 'edit'])->name('edit');
			Route::put('/update', [BranchController::class, 'update'])->name('update');
			Route::get('/delete/{id}', [BranchController::class, 'delete'])->name('delete');
			Route::get('/change/{id}', [BranchController::class, 'change'])->name('change');
		});

		// warehouses
		Route::prefix('warehouses/')->name('warehouses.')->group(function(){
			Route::get('/', [WarehouseController::class, 'index'])->name('index');
			Route::post('/warehouses/create', [WarehouseController::class, 'create'])->name('create');
			Route::get('/warehouses/edit', [WarehouseController::class, 'edit'])->name('edit');
			Route::put('/warehouses/update', [WarehouseController::class, 'update'])->name('update');
			Route::get('/warehouses/search', [WarehouseController::class, 'search'])->name('search');
		});

		// careers
		Route::prefix('human')->name('human.')->group(function(){
			Route::prefix('careers')->name('careers.')->group(function(){
				Route::get('/', [CareerController::class, 'indexAdmin'])->name('index');
				Route::get('/show/{id}', [CareerController::class, 'showAdmin'])->name('show');
				Route::get('/download/{filename}', [CareerController::class, 'downloadAdmin'])->name('download');
				Route::post('/create', [CareerController::class, 'createAdmin'])->name('create');
				Route::get('/activate/{id}', [CareerController::class, 'activate'])->name('activate');
				Route::get('/edit', [CareerController::class, 'edit'])->name('edit');
				Route::put('/update', [CareerController::class, 'update'])->name('update');
				Route::get('delete/{id}', [CareerController::class, 'delete'])->name('delete');
			});
		});

		// blogs
		Route::prefix('blogs/')->name('blogs.')->group(function(){
			Route::get('/', [BlogController::class, 'indexAdmin'])->name('index');
			Route::post('/create', [BlogController::class, 'createAdmin'])->name('create');
			Route::get('/edit', [BlogController::class, 'editAdmin'])->name('edit');
			Route::put('/update', [BlogController::class, 'updateAdmin'])->name('update');
			Route::get('/delete/{id}', [BlogController::class, 'deleteAdmin'])->name('delete');
		});

		// additional service
		Route::prefix('services/')->name('services.')->group(function(){
			Route::get('/', [AdditionalServiceController::class, 'index'])->name('index');
			Route::post('/create', [AdditionalServiceController::class, 'create'])->name('create');
			Route::get('/edit', [AdditionalServiceController::class, 'edit'])->name('edit');
			Route::put('/update', [AdditionalServiceController::class, 'update'])->name('update');
			Route::get('/delete/{id}', [AdditionalServiceController::class, 'delete'])->name('delete');
		});

		// balance
		Route::prefix('balance/')->name('balance.')->group(function(){
			Route::get('/index', [BalanceController::class, 'index'])->name('index');
			Route::get('/cards', [BalanceController::class, 'cards'])->name('cards');
		});

		//wardrobe
		Route::prefix('wardrobes/')->name('wardrobes.')->group(function(){
			Route::get('/index', [WardrobeController::class, 'index'])->name('index');
			Route::post('/create', [WardrobeController::class, 'create'])->name('create');
			Route::get('/edit', [WardrobeController::class, 'edit'])->name('edit');
			Route::put('/update', [WardrobeController::class, 'update'])->name('update');
			Route::get('/delete/{id}', [WardrobeController::class, 'delete'])->name('delete');

			Route::prefix('shelves/')->name('shelves.')->group(function(){
				Route::get('/index', [ShelfController::class, 'index'])->name('index');
				Route::post('/create', [ShelfController::class, 'create'])->name('create');
				Route::get('/edit', [ShelfController::class, 'edit'])->name('edit');
				Route::put('/update', [ShelfController::class, 'update'])->name('update');
				Route::get('/delete/{id}', [ShelfController::class, 'delete'])->name('delete');
				Route::get('/activate/{id}', [ShelfController::class, 'activate'])->name('activate');
			});
		});
	});


});




//------------------------User Panel------------------------//
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');

Route::prefix('userpanel')->name('userpanel.')->group(function(){
    Route::post('/createuser', [UserAuth::class, 'create'])->name('create_user');
    Route::post('/loginuser', [UserAuth::class, 'login'])->name('login_user');

    Route::middleware('userpanellogin')->group(function(){
        Route::get('/', [UserPanelController::class, 'index'])->name('index');
        Route::post('/updateuser', [UserPanelController::class, 'updateuser'])->name('updateuser');
        Route::post('/updateuser', [UserPanelController::class, 'updateuser'])->name('updateuser');
        Route::post('/deleteuseraddress/{address_id}', [UserPanelController::class, 'deleteuseraddress'])->name('delete_user_address');
        Route::post('/updatemyprofile', [UserPanelController::class, 'updatemyprofile'])->name('updatemyprofile');
        Route::post('/updateuseraddress', [UserPanelController::class, 'updateuseraddress'])->name('updateuseraddress');

        Route::get('/logout', [UserAuth::class, 'logout'])->name('logout_user');
	});
});

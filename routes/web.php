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
    CourierRequest,
};
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PriceCalculationController;
use App\Http\Controllers\CalculateController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\userpanel\SimplePages;
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
Route::get('/service', [HomeController::class, 'service'])->name('servcice');
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
		Route::post('/updateprofile', [AdminController::class, 'updateprofile'])->name('profile.update');
		Route::post('/updateimage', [AdminController::class, 'updateimage'])->name('image.update');

		// users
		Route::get('/users', [UserController::class, 'index'])->name('users');
		Route::get('/users/{id}', [UserController::class, 'details'])->name('users.details');
		Route::post('/users/addnew', [UserController::class, 'addnew'])->name('users.addnew');
		Route::get('/ban_user{id}', [UserController::class, 'ban_user'])->name('users.ban_user');
		Route::get('/unban_user{id}', [UserController::class, 'unban_user'])->name('users.unban_user');
		Route::get('/user_logs', [UserController::class, 'user_logs'])->name('user_logs');
		Route::post('/users/update/general/{id}', [UserController::class, 'updateUserGeneral'])->name('users.general.update');
		Route::post('/users/update/password/{id}', [UserController::class, 'updateUserPassword'])->name('users.password.update');

		Route::post('/users/sendemail', [UserController::class, 'sendEmail'])->name('users.sendemail');

		// order
		Route::prefix('orders/')->name('orders.')->group(function(){
			Route::get('/', [ManuelOrderController::class, 'index'])->name('index');
		});

        Route::prefix('cargo-requests/')->name('cargo-requests.')->group(function(){
			Route::get('/cargo-request-index', [ManuelOrderController::class, 'cargoRequests'])->name('index');
			Route::get('/cargo_details/{id}', [ManuelOrderController::class, 'cargo_details'])->name('cargo_details');
			Route::post('/cargo_update/{id}', [ManuelOrderController::class, 'cargo_update'])->name('cargo_update');
			Route::get('/packages', [ManuelOrderController::class, 'packages'])->name('packages');

			Route::get('/courier_requests', [CourierRequest::class, 'courier_requests'])->name('courier_requests');
			Route::get('/myorders', [CourierRequest::class, 'myorders'])->name('myorders');
			Route::post('/update_courier_request', [CourierRequest::class, 'update_courier_request'])->name('update_courier_request');
			Route::post('/status_courier_request', [CourierRequest::class, 'status_courier_request'])->name('status_courier_request');

			Route::get('/submit_order/{id}', [ManuelOrderController::class, 'submit_order'])->name('submit_order');
			Route::get('/post_on_wait/{id}', [ManuelOrderController::class, 'post_on_wait'])->name('post_on_wait');
			Route::get('/remove_on_wait/{id}', [ManuelOrderController::class, 'remove_on_wait'])->name('remove_on_wait');
			Route::post('/cancel_order/{id}', [ManuelOrderController::class, 'cancel_order'])->name('cancel_order');
			Route::get('/revert_order/{id}', [ManuelOrderController::class, 'revert_order'])->name('revert_order');

			Route::get('/cargo_logs', [ManuelOrderController::class, 'cargo_logs'])->name('cargo_logs');
			Route::get('/cargo_logs/{id}', [ManuelOrderController::class, 'cargo_logs_with_id'])->name('cargo_logs_with_id');

			Route::get('/buyforme', [ManuelOrderController::class, 'buyforme'])->name('buyforme');
			Route::get('/amazonOrders', [ManuelOrderController::class, 'amazonOrders'])->name('amazonOrders');

			Route::get('/custom_order_details/{id}', [ManuelOrderController::class, 'custom_order_details'])->name('custom_order_details');
			Route::post('/order_update/{id}', [ManuelOrderController::class, 'order_update'])->name('order_update');
			Route::post('/order_action', [ManuelOrderController::class, 'order_action'])->name('order_action');

            Route::get('/special_offers', [ManuelOrderController::class, 'special_offers'])->name('special_offers');
            Route::post('/give_offer/{id}', [ManuelOrderController::class, 'give_offer'])->name('give_offer');

		});

        Route::prefix('scanners/')->name('scanners.')->group(function(){
			Route::get('/facilityscan', [ManuelOrderController::class, 'facilityscan'])->name('facilityscan');
			Route::get('/workerscan', [ManuelOrderController::class, 'workerscan'])->name('workerscan');
			Route::get('/searchscan', [ManuelOrderController::class, 'searchscan'])->name('searchscan');
			Route::get('/measurement', [ManuelOrderController::class, 'measurement'])->name('measurement');

			Route::post('/scannedcode', [ManuelOrderController::class, 'scannedcode'])->name('scannedcode');
			Route::post('/workerscannedcode', [ManuelOrderController::class, 'workerscannedcode'])->name('workerscannedcode');
			Route::post('/searchscannedcode', [ManuelOrderController::class, 'searchscannedcode'])->name('searchscannedcode');
			Route::post('/measurementUpdate', [ManuelOrderController::class, 'measurementUpdate'])->name('measurementUpdate');
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

            Route::get('/notifications', [MessageController::class, 'showNotifications'])->name('showNotifications');
            Route::post('/add-notification', [MessageController::class, 'addNotification'])->name('addNotification');
            Route::get('/disable-notification/{id}', [MessageController::class, 'disableNotification'])->name('disableNotification');
            Route::get('/activate-notification/{id}', [MessageController::class, 'activateNotification'])->name('activateNotification');
            Route::post('/edit-notification', [MessageController::class, 'editNotification'])->name('editNotification');
            Route::get('/delete-notification/{id}', [MessageController::class, 'deleteNotification'])->name('deleteNotification');

            Route::get('/usages', [MessageController::class, 'usages'])->name('usages');
            Route::post('/add-usage', [MessageController::class, 'addUsage'])->name('addUsage');
            Route::get('/disable-usage/{id}', [MessageController::class, 'disableUsage'])->name('disableUsage');
            Route::get('/activate-usage/{id}', [MessageController::class, 'activateUsage'])->name('activateUsage');
            Route::post('/edit-usage', [MessageController::class, 'editUsage'])->name('editUsage');
            Route::get('/delete-usage/{id}', [MessageController::class, 'deleteUsage'])->name('deleteUsage');

            Route::get('/support', [MessageController::class, 'support'])->name('support');
            Route::post('/support_message', [MessageController::class, 'support_message'])->name('support_message');
            Route::get('/show_support_chat', [MessageController::class, 'show_support_chat'])->name('show_support_chat');
            Route::post('/sendMessage', [MessageController::class, 'sendMessage'])->name('sendMessage');
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
			Route::post('/cargo/update', [CargoCompanyController::class, 'update'])->name('cargo.update');

			Route::get('/cargo/delete/{id}', [CargoCompanyController::class, 'delete'])->name('cargo.delete');
			Route::post('/cargo/upload', [CargoCompanyController::class, 'upload'])->name('cargo.upload');
			Route::get('/download/list', [CargoCompanyController::class, 'downloadList'])->name('cargo.download.list');
			Route::get('/download/zone', [CargoCompanyController::class, 'downloadZone'])->name('cargo.download.zone');

			Route::get('/domestic', [DomesticCompanyController::class, 'index'])->name('domestic');
			Route::post('/domestic/create', [DomesticCompanyController::class, 'create'])->name('domestic.create');
			Route::get('/domestic/edit', [DomesticCompanyController::class, 'edit'])->name('domestic.edit');
			Route::put('/domestic/update', [DomesticCompanyController::class, 'update'])->name('domestic.update');
			Route::get('/domestic/delete/{id}', [DomesticCompanyController::class, 'delete'])->name('domestic.delete');

			Route::get('/personal', [CargoCompanyController::class, 'personal_cargo'])->name('personal');
			Route::post('/create_personal_cargo', [CargoCompanyController::class, 'create_personal_cargo'])->name('create_personal_cargo');

            Route::get('/amazon_addresses', [CargoCompanyController::class, 'amazon_addresses'])->name('amazon_addresses');
            Route::post('/amazon/addresses/create', [CargoCompanyController::class, 'amazon_addresses_create'])->name('amazon_addresses.create');
            Route::patch('/amazon/addresses/{amazon_address}', [CargoCompanyController::class, 'amazon_addresses_update'])->name('amazon_addresses.update');
            Route::get('/amazon/addresses/delete/{amazon_address}', [CargoCompanyController::class, 'amazon_addresses_delete'])->name('amazon_addresses.delete');

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
		Route::prefix('payments/')->name('payments.')->group(function(){
			Route::get('/transactions', [BalanceController::class, 'transactions'])->name('transactions');
			Route::get('/payments', [BalanceController::class, 'payments'])->name('payments');
			Route::get('/comissions', [BalanceController::class, 'comissions'])->name('comissions');
            Route::get('/moneyBackRequests', [BalanceController::class, 'moneyBackRequests'])->name('moneyBackRequests');

			Route::post('/denyPayment', [BalanceController::class, 'denyPayment'])->name('denyPayment');
			Route::post('/approvePayment', [BalanceController::class, 'approvePayment'])->name('approvePayment');

			Route::post('/updatePayment', [BalanceController::class, 'updatePayment'])->name('updatePayment');
			Route::post('/updateComission', [BalanceController::class, 'updateComission'])->name('updateComission');
			Route::post('/addnewComission', [BalanceController::class, 'addnewComission'])->name('addnewComission');
			Route::get('/deleteComission/{id}', [BalanceController::class, 'deleteComission'])->name('deleteComission');

			Route::post('/addpayment', [BalanceController::class, 'addPayment'])->name('addpayment');
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
    Route::get('/verifyEmail/{email}', [UserAuth::class, 'verifyEmail'])->name('verifyEmail');
    Route::post('/loginuser', [UserAuth::class, 'login'])->name('login_user');

    Route::middleware('userpanellogin')->group(function(){
        Route::get('/', [UserPanelController::class, 'index'])->name('index');
        Route::get('/mainmenu', [UserPanelController::class, 'mainmenu'])->name('mainmenu');
        Route::get('/loadChartsMainPage', [UserPanelController::class, 'loadChartsMainPage'])->name('loadChartsMainPage');

        Route::post('/main_search', [UserPanelController::class, 'main_search'])->name('main_search');
        Route::get('/getsortedcargo_orders/{status}', [UserPanelController::class, 'GetSortedCargoOrders'])->name('GetSortedCargoOrders');

        Route::get('/viewCargoDetails/{id}', [UserPanelController::class, 'viewCargoDetails'])->name('viewCargoDetails');

        Route::post('/updateuser', [UserPanelController::class, 'updateuser'])->name('updateuser');
        Route::post('/deleteuseraddress/{address_id}', [UserPanelController::class, 'deleteuseraddress'])->name('delete_user_address');
        Route::post('/updatemyprofile', [UserPanelController::class, 'updatemyprofile'])->name('updatemyprofile');

        Route::get('/getuseraddress', [UserPanelController::class, 'getuseraddress'])->name('getuseraddress');
        Route::post('/adduseraddress', [UserPanelController::class, 'adduseraddress'])->name('adduseraddress');
        Route::post('/updateuseraddress', [UserPanelController::class, 'updateuseraddress'])->name('updateuseraddress');


        Route::get('/manualorder', [UserPanelController::class, 'manualorder'])->name('manualorder');
        Route::post('/postManualorder', [UserPanelController::class, 'postManualorder'])->name('post.manualorder');
        Route::post('/getquotemanualorder', [UserPanelController::class, 'getquotemanualorder'])->name('getquote.manualorder');

        Route::get('/generatePdfManualOrder/{id}', [UserPanelController::class, 'generatePdfManualOrder'])->name('generatePdfManualOrder');
        Route::get('/generatePdfAmazonOrder/{id}', [SimplePages::class, 'generatePdfAmazonOrder'])->name('generatePdfAmazonOrder');

        Route::get('/cargorequests', [UserPanelController::class, 'cargorequests'])->name('cargorequests');
        Route::post('/updatecargo/{id}', [UserPanelController::class, 'updatecargo'])->name('updatecargo');


        Route::get('/balance', [UserPanelController::class, 'balance'])->name('balance');
        Route::get('/transactions', [UserPanelController::class, 'transactions'])->name('transactions');
        Route::get('/getKur', [UserPanelController::class, 'getKur'])->name('getKur');

        Route::post('/update-balance', [UserPanelController::class, 'updateBalance'])->name('update_balance');
        Route::post('/check-comission', [UserPanelController::class, 'checkcomission'])->name('checkcomission');
        Route::post('/updateUserBalanceInfo', [UserPanelController::class, 'updateUserBalanceInfo'])->name('updateUserBalanceInfo');
        Route::post('/postMoneyBackRequest', [UserPanelController::class, 'postMoneyBackRequest'])->name('postMoneyBackRequest');

        Route::get('/courier_request', [UserPanelController::class, 'courier_request'])->name('courier_request');
        Route::post('/post_courier_request', [UserPanelController::class, 'post_courier_request'])->name('post_courier_request');

        Route::get('/cargo_companies', [UserPanelController::class, 'cargo_companies'])->name('cargo_companies');

        Route::get('/marketplace', [UserPanelController::class, 'marketplace'])->name('marketplace');
        Route::post('/updateMarket', [UserPanelController::class, 'updateMarket'])->name('updateMarket');

        Route::get('/share_and_earn', [SimplePages::class, 'share_and_earn'])->name('share_and_earn');

        Route::get('/support', [SimplePages::class, 'support'])->name('support');
        Route::post('/support_demand', [SimplePages::class, 'support_demand'])->name('support_demand');
        Route::post('/sendMessage', [SimplePages::class, 'sendMessage'])->name('sendMessage');

        Route::get('/calculator', [SimplePages::class, 'calculator'])->name('calculator');
        Route::get('/faq', [SimplePages::class, 'faq'])->name('faq');

        Route::get('/notifications', [SimplePages::class, 'notifications'])->name('notifications');
        Route::get('/getnotification', [SimplePages::class, 'getnotification'])->name('getnotification');

        Route::get('/locations', [SimplePages::class, 'locations'])->name('locations');
        Route::get('/siteusage', [SimplePages::class, 'siteusage'])->name('siteusage');

        Route::get('/buyforme', [SimplePages::class, 'buyforme'])->name('buyforme');
        Route::post('/post_buyforme', [SimplePages::class, 'post_buyforme'])->name('post_buyforme');
        Route::post('/order_status_action', [SimplePages::class, 'order_status_action'])->name('order_status_action');

        Route::get('/amazon_order', [SimplePages::class, 'amazon_order'])->name('amazon_order');
        Route::post('/post_amazon_order', [SimplePages::class, 'postAmazonorder'])->name('postAmazonorder');

        Route::get('/bulk_order', [SimplePages::class, 'bulk_order'])->name('bulk_order');
        Route::post('/create_bulk_order', [SimplePages::class, 'create_bulk_order'])->name('create_bulk_order');

        Route::get('/get_special_offer', [SimplePages::class, 'get_special_offer'])->name('get_special_offer');
        Route::post('/post_special_offer', [SimplePages::class, 'post_special_offer'])->name('post_special_offer');
        Route::get('/special_offers', [SimplePages::class, 'special_offers'])->name('special_offers');

        Route::get('/logout', [UserAuth::class, 'logout'])->name('logout_user');
	});
});

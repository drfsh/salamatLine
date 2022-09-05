<?php

use Illuminate\Support\Facades\Route;
Route::group(['middleware' => ['auth','isAdmin']], function() {

	Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'main'])->name('admin');
	Route::get('/test', [App\Http\Controllers\Admin\HomeController::class, 'test'])->name('g');
	Route::get('components', [App\Http\Controllers\Admin\HomeController::class, 'components'])->name('ComponentAdmin');

    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::get('admins', [App\Http\Controllers\Admin\UserController::class,'admin'])->name('admins');
    Route::resource('person', App\Http\Controllers\Admin\PersonUserController::class);
    Route::resource('colleague', App\Http\Controllers\Admin\ColleagueController::class);

    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
	Route::resource('permissions', App\Http\Controllers\Admin\PermissionController::class);
	Route::resource('mobile', App\Http\Controllers\Admin\UsermobileController::class)->only(['create', 'store']);

	Route::resource('category', App\Http\Controllers\Admin\CategoryController::class, ['except' => ['show']]);
	Route::get('category/up/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'up'])->name('UpCategory');
	Route::get('category/down/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'down'])->name('DownCategory');
	Route::get('category/hide/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'hide_show'])->name('hideCategory');
	Route::get('category/hidePrice/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'hide_price'])->name('hideCategoryPrice');
	Route::get('category/showPrice/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'show_price'])->name('showCategoryPrice');
//1365 product
    Route::put('brand/change/product', [App\Http\Controllers\Admin\BrandController::class, 'productStatus']);
    Route::resource('brand', App\Http\Controllers\Admin\BrandController::class, ['except' => ['show']]);
    Route::get('brand/api', [App\Http\Controllers\Admin\BrandController::class, 'api']);
    Route::get('brand/hidePrice/{id}', [App\Http\Controllers\Admin\BrandController::class, 'hide_price']);
    Route::get('brand/showPrice/{id}', [App\Http\Controllers\Admin\BrandController::class, 'show_price']);
    Route::get('brand/hide/{id}', [App\Http\Controllers\Admin\BrandController::class, 'showhide']);

	Route::resource('company', App\Http\Controllers\Admin\CompanyController::class, ['except' => ['show']]);
	Route::resource('country', App\Http\Controllers\Admin\CountryController::class, ['except' => ['show']]);
	Route::resource('material', App\Http\Controllers\Admin\MaterialController::class, ['except' => ['show']]);
	Route::resource('product', App\Http\Controllers\Admin\ProductController::class, ['except' => ['show']]);
	Route::resource('collection', App\Http\Controllers\Admin\CollectionController::class, ['except' => ['show']]);
	Route::resource('discount', App\Http\Controllers\Admin\DiscountController::class);
	Route::resource('coupon', App\Http\Controllers\Admin\CouponController::class, ['except' => ['show']]);

	Route::resource('province', App\Http\Controllers\Admin\ProvinceController::class, ['except' => ['show']]);
	Route::resource('city', App\Http\Controllers\Admin\CityController::class, ['except' => ['show']]);
	Route::resource('district', App\Http\Controllers\Admin\DistrictController::class, ['except' => ['show']]);
	Route::get('address', [App\Http\Controllers\Admin\AddressController::class, 'index'])->name('AddressList');

	Route::get('product/deleteimage/{id}', [App\Http\Controllers\Admin\ProductController::class, 'DeleteImage'])->name('DeleteImage');
	Route::get('product/deletemulti/{id}', [App\Http\Controllers\Admin\ProductController::class, 'DeleteMulti'])->name('DeleteMulti');
	Route::post('product/priceupdate/{id}', [App\Http\Controllers\Admin\ProductController::class, 'Priceupdate'])->name('Priceupdate');
	Route::get('product/pricedelete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'Pricedelete'])->name('Pricedelete');
	Route::post('product/featureupdate/{id}', [App\Http\Controllers\Admin\ProductController::class, 'Featureupdate'])->name('Featureupdate');
	Route::get('product/featuredelete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'Featuredelete'])->name('Featuredelete');

	Route::post('product/inline-update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'InlineUpdate']);
	Route::post('product/active/{id}', [App\Http\Controllers\Admin\ProductController::class, 'Active']);


	Route::resource('slider', App\Http\Controllers\Admin\SliderController::class, ['except' => ['show']]);
	Route::resource('subslider', App\Http\Controllers\Admin\SubsliderController::class, ['except' => ['show']]);
	Route::resource('social', App\Http\Controllers\Admin\SocialController::class, ['except' => ['show']]);
	Route::resource('page', App\Http\Controllers\Admin\PageController::class, ['except' => ['show']]);
	Route::resource('banner', App\Http\Controllers\Admin\BannerController::class, ['except' => ['show']]);

	Route::get('reviews/unapproved',[App\Http\Controllers\Admin\ReviewrateController::class, 'index'])->name('UnReviewrate');
	Route::get('reviews/approved',[App\Http\Controllers\Admin\ReviewrateController::class, 'approved'])->name('Reviewrate');
	Route::get('reviews/approverate/{id}', [App\Http\Controllers\Admin\ReviewrateController::class, 'ApproveRate'])->name('ApproveRate');
	Route::get('reviews/unapproverate/{id}', [App\Http\Controllers\Admin\ReviewrateController::class, 'UnapproveRate'])->name('UnapproveRate');

	Route::resource('holiday', App\Http\Controllers\Admin\HolidayController::class, ['except' => ['show', 'create']]);

	Route::get('history', [App\Http\Controllers\Admin\HistoryController::class, 'index'])->name('AdminHistory');

	Route::get('inventory', [App\Http\Controllers\Admin\InventoryController::class, 'index'])->name('Inventory');
	Route::post('inventory/add', [App\Http\Controllers\Admin\InventoryController::class, 'add']);
	Route::get('inventory/all', [App\Http\Controllers\Admin\InventoryController::class, 'all']);
	Route::post('inventory/update/{id}', [App\Http\Controllers\Admin\InventoryController::class, 'update']);
	Route::delete('inventory/delete/{id}', [App\Http\Controllers\Admin\InventoryController::class, 'delete']);
	Route::get('allapi/products', [App\Http\Controllers\Admin\AllController::class, 'Products']);
	Route::get('allapi/product-detail/{id}', [App\Http\Controllers\Admin\AllController::class, 'ProductDetail']);
	Route::get('allapi/set-multiprice/{id}', [App\Http\Controllers\Admin\AllController::class, 'SetMultiPrice']);
	Route::get('allapi/users', [App\Http\Controllers\Admin\AllController::class, 'Users']);
	Route::get('allapi/address/{id}', [App\Http\Controllers\Admin\AllController::class, 'Addresses']);

	Route::get('api/product', [App\Http\Controllers\Admin\ApiController::class, 'product']);
	Route::get('api/brand', [App\Http\Controllers\Admin\ApiController::class, 'brand']);
	Route::get('api/company', [App\Http\Controllers\Admin\ApiController::class, 'company']);
	Route::get('api/country', [App\Http\Controllers\Admin\ApiController::class, 'country']);
	Route::get('api/category', [App\Http\Controllers\Admin\ApiController::class, 'category']);

	Route::resource('contactinfo', App\Http\Controllers\Admin\ContactinfoController::class, ['except' => ['show', 'destroy']]);
	Route::resource('newsletter', App\Http\Controllers\Admin\NewLetterController::class);

	Route::get('invoices',[App\Http\Controllers\Admin\Invoice\Main::class, 'index'])->name('AdminInvoice');
	Route::get('invoices/api',[App\Http\Controllers\Admin\Invoice\Main::class, 'GetInvoice']);

	Route::post('invoices/paid/{id}',[App\Http\Controllers\Admin\Invoice\Steps::class, 'ChangePaid']);
	Route::post('invoices/producing/{id}',[App\Http\Controllers\Admin\Invoice\Steps::class, 'ChangeProducing']);
	Route::post('invoices/sending/{id}',[App\Http\Controllers\Admin\Invoice\Steps::class, 'ChangeSending']);
	Route::get('invoices/get-print/{id}',[App\Http\Controllers\Admin\Invoice\GetPrint::class, 'main'])->name('GetPrint');
	Route::get('invoices/{id}',[App\Http\Controllers\Admin\Invoice\Factor::class, 'main'])->name('ShowInvoice');
	Route::delete('preinvoice/delete/{id}',[App\Http\Controllers\Admin\InvoiceController::class, 'delete'])->name('deleteInvoice');
	Route::get('preinvoice',[App\Http\Controllers\Admin\InvoiceController::class, 'index'])->name('AdminPreInvoice');
	Route::get('my-preinvoices',[App\Http\Controllers\Admin\InvoiceController::class, 'MyPreinvoice'])->name('MyPreInvoice');;
	Route::get('preinvoice/create',[App\Http\Controllers\Admin\InvoiceController::class, 'create'])->name('PreInvoice');
	Route::post('preinvoice/store',[App\Http\Controllers\Admin\InvoiceController::class, 'store'])->name('CreatePreinvoice');

	Route::get('re-stock',[App\Http\Controllers\Admin\ReStockController::class, 'main'])->name('AdminRestock');
	Route::get('re-stock-notified',[App\Http\Controllers\Admin\ReStockController::class, 'notified'])->name('RestockNotified');


	Route::get('report',[App\Http\Controllers\Admin\report\main::class, 'index'])->name('AdminReport');
	Route::get('report/{slug}',[App\Http\Controllers\Admin\report\detail::class, 'index'])->name('OrderDeatil');
    Route::get('survey',[App\Http\Controllers\Admin\SurveyController::class, 'index'])->name('ShowSurvey');
	Route::get('/dev/build', function() {
		$status = Artisan::call('migrate', [
		'--force' => true,
	]);
		return $status;
	});
});


// Route::post('/invoices/paid/{id}','admin\ProductionSteps@changepaid')->name('paid.update');
// Route::post('/invoices/producing/{id}','admin\ProductionSteps@changeproducing')->name('producing.update');
// Route::post('/invoices/sending/{id}','admin\ProductionSteps@changesending')->name('sending.update');
// Route::get('/get-print/{id}', 'panel\order\SendController@Print')->name('GetPrint');

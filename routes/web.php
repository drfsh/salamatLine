<?php

use App\Mail\ForAdmin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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
Auth::routes();
//Sms Login
Route::post('request-login/{id}', [App\Http\Controllers\Auth\SmsLoginController::class, 'main']);
Route::post('approve-code/{id}', [App\Http\Controllers\Auth\SmsLoginController::class, 'CheckForLogin']);


Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'main'])->name('home');
Route::get('/cart', [App\Http\Controllers\Front\CartController::class, 'main'])->name('cart');
Route::get('/products', [App\Http\Controllers\Front\ProductHolderController::class, 'main'])->name('productHolder');
Route::get('/products/{slug}', [App\Http\Controllers\Front\ProductController::class, 'main'])->name('product');
Route::get('/test', function () {


    $allView = 0;
    $buy = 0;
    $newUser = 0;
    $newProduct = 0;
    $newComment = 0;
    Mail::to("mahdidera63@gmail.com")->queue(new ForAdmin($allView,$buy,$newUser,$newProduct,$newComment));

    return view('email.forAdmin');
});


Route::group(['middleware' => ['web']], function () {
    Route::post('cart/add/{id}', [App\Http\Controllers\Front\Cart\AddToCartController::class, 'main']);
    Route::get('cart/items', [App\Http\Controllers\Front\Cart\AddToCartController::class, 'items']);
    Route::get('cart/detail', [App\Http\Controllers\Front\Cart\CartDetailController::class, 'main']);


    Route::post('cart/update/{id}', [App\Http\Controllers\Front\Cart\StepOneController::class, 'Update']);
    Route::post('cart/updaterow/{id}', [App\Http\Controllers\Front\Cart\StepOneController::class, 'Updaterow']);
    Route::get('cart/remove-cart-item/{id}', [App\Http\Controllers\Front\Cart\StepOneController::class, 'RemoveItem']);

// Cart Routes
    Route::get('cart/address/list', [App\Http\Controllers\Front\Cart\AddressController::class, 'MyAddress']);
    Route::get('cart/address/province', [App\Http\Controllers\Front\Cart\AddressController::class, 'province']);
    Route::get('cart/address/city/{id}', [App\Http\Controllers\Front\Cart\AddressController::class, 'city']);
    Route::get('cart/address/district/{id}', [App\Http\Controllers\Front\Cart\AddressController::class, 'district']);
    Route::post('cart/address/new', [App\Http\Controllers\Front\Cart\AddressController::class, 'new']);
    Route::get('cart/address/delete/{id}', [App\Http\Controllers\Front\Cart\AddressController::class, 'delete']);
    Route::put('cart/address/edit/{id}', [App\Http\Controllers\Front\Cart\AddressController::class, 'update']);

    Route::get('cart/check-date', [App\Http\Controllers\Front\Cart\StepThreeController::class, 'checkDate']);
    Route::post('cart/check-step', [App\Http\Controllers\Front\Cart\CheckStepController::class, 'main']);
    Route::post('add-coupon', [App\Http\Controllers\Front\CouponController::class, 'addCoupon'])->name('CartCoupon');
    Route::get('remove-coupon', [App\Http\Controllers\Front\CouponController::class, 'DeleteCoupon'])->name('RemoveCoupon');
    Route::get('get-condition', [App\Http\Controllers\Front\CouponController::class, 'getCondition'])->name('GetCondition');

    Route::post('payment/pasargad', [App\Http\Controllers\Front\Payment\MainController::class, 'main']);
    Route::put('repayment/pasargad/{id}', [App\Http\Controllers\Front\Payment\MainController::class, 'repay']);
    Route::get('payment/pasargad-callback', [App\Http\Controllers\Front\Payment\MainController::class, 'passarGadCallback']);

// End cart routes

    Route::get('search', [App\Http\Controllers\Front\SearchController::class, 'main'])->name('search');

    Route::get('/category', [App\Http\Controllers\Front\CategoryController::class, 'holder'])->name('categoryHolder');
    Route::get('/category/{slug}', [App\Http\Controllers\Front\CategoryController::class, 'main'])->name('category');
    Route::get('/collection', [App\Http\Controllers\Front\CollectionController::class, 'holder'])->name('collectionHolder');
    Route::get('/collection/{slug}', [App\Http\Controllers\Front\CollectionController::class, 'main'])->name('collection');

//review & rate
    Route::post('/products/{slug}', [App\Http\Controllers\Front\ProductController::class, 'review'])->name('review');

//NewsLetter
    Route::post('/subscribe', [App\Http\Controllers\Front\NewsletterController::class, 'Subscribe'])->name('Subscribe');


// Normal Pages
    Route::get('page', [App\Http\Controllers\Front\PageController::class, 'index'])->name('indexpage');
    Route::get('page/{slug}', [App\Http\Controllers\Front\PageController::class, 'main'])->name('singlepage');
    Route::get('contact-us', [App\Http\Controllers\Front\PageController::class, 'contactUs'])->name('contactus');
    Route::get('about-us', [App\Http\Controllers\Front\PageController::class, 'about'])->name('about');
    Route::get('faq', [App\Http\Controllers\Front\PageController::class, 'faq'])->name('faq');
    Route::post('faq', [App\Http\Controllers\Front\PageController::class, 'faq_new'])->name('faq_new');
    Route::post('contact-us', [App\Http\Controllers\Front\PageController::class, 'contact_new']);
    Route::get('help', [App\Http\Controllers\Front\PageController::class, 'help'])->name('help');

    Route::get('brands', [App\Http\Controllers\Front\BrandController::class, 'holder'])->name('brandHolder');
    Route::get('brands/{slug}', [App\Http\Controllers\Front\BrandController::class, 'main'])->name('brand');

    Route::get('companies', [App\Http\Controllers\Front\CompanyController::class, 'holder'])->name('companyHolder');
    Route::get('companies/{slug}', [App\Http\Controllers\Front\CompanyController::class, 'main'])->name('company');

    Route::get('country', [App\Http\Controllers\Front\CountryController::class, 'holder'])->name('countryHolder');
    Route::get('country/{slug}', [App\Http\Controllers\Front\CountryController::class, 'main'])->name('country');

    Route::get('promotion-center', [App\Http\Controllers\Front\DiscountController::class, 'main'])->name('discount');
    Route::get('featured', [App\Http\Controllers\Front\FeaturedController::class, 'main'])->name('featured');

    Route::get('/partner', [App\Http\Controllers\Front\PartnerController::class, 'main'])->name('Partner');
    Route::post('/partner', [App\Http\Controllers\Front\PartnerController::class, 'PartnerRequest'])->name('PartnerRequest');

    Route::get('/compare/search', [App\Http\Controllers\Front\CompareController::class, 'search'])->name('CompareSearch');
    Route::get('/compare/add-product/{id}', [App\Http\Controllers\Front\CompareController::class, 'add'])->name('AddCompare');
    Route::get('/compare/{slug}', [App\Http\Controllers\Front\CompareController::class, 'main'])->name('Compare');

    Route::post('/notify-stock/{id}', [App\Http\Controllers\Front\ReStockController::class, 'main'])->name('NotifyStock');

    Route::get('/auth/{provider}', [App\Http\Controllers\Auth\SocialController::class, 'redirectToProvider'])->name('SocialLogin');
    Route::get('/auth/{provider}/callback', [App\Http\Controllers\Auth\SocialController::class, 'handleProviderCallback']);

    Route::get('/tickets', [App\Http\Controllers\Front\Ticket\TicketController::class, 'main'])->name('Tickets');
    Route::get('/new-ticket', [App\Http\Controllers\Front\Ticket\TicketController::class, 'newTicket'])->name('NewTickets');
    Route::get('/ticket/{code}-{id}', [App\Http\Controllers\Front\Ticket\TicketController::class, 'view'])->name('ticket');
    Route::get('/ticket/make', [App\Http\Controllers\Front\Ticket\TicketController::class, 'make'])->name('CreateTicket');
    Route::get('/tickets/get', [App\Http\Controllers\Front\Ticket\TicketController::class, 'getList'])->name('getTicket');

});

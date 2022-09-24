<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['isAdmin']], function() {

    Route::get('/', [App\Http\Controllers\Front\Profile\HomeController::class, 'main'])->name('profile');
    Route::get('address', [App\Http\Controllers\Front\Profile\AddressController::class, 'main'])->name('ProfileAddress');
    Route::get('edit', [App\Http\Controllers\Front\Profile\EditController::class, 'main'])->name('ProfileEdit');
    Route::get('orders', [App\Http\Controllers\Front\Profile\OrdersController::class, 'main'])->name('ProfileOrders');
    Route::get('/orders/api/get', [App\Http\Controllers\Front\Profile\OrdersController::class, 'get']);
    Route::get('/orders/api/get/{id}', [App\Http\Controllers\Front\Profile\OrdersController::class, 'getOne']);
    Route::get('/order/{id}', [App\Http\Controllers\Front\Profile\OrdersController::class, 'get'])->name('order');
    Route::get('/orders/invoice/order/{id}', [App\Http\Controllers\Front\Profile\OrdersController::class, 'factor'])->name('factor');
    Route::get('orders-tracking', [App\Http\Controllers\Front\Profile\OrdersController::class, 'tracking'])->name('OrdersTracking');
    Route::post('orders-check/send-code', [App\Http\Controllers\Front\Profile\OrdersController::class, 'check_send_code']);
    Route::post('orders-check', [App\Http\Controllers\Front\Profile\OrdersController::class, 'check']);
    Route::get('orders/history', [App\Http\Controllers\Front\Profile\OrdersController::class, 'history'])->name('OrderHistory');
    Route::get('change-password', [App\Http\Controllers\Front\Profile\PasswordController::class, 'main'])->name('ChangePassword');

    Route::post('success-invoice/{id}', [App\Http\Controllers\Front\Profile\OrdersController::class, 'Success'])->name('SuccessInvoice');
    Route::post('delete-invoice/{id}', [App\Http\Controllers\Front\Profile\OrdersController::class, 'Delete'])->name('DeleteInvoice');
    Route::put('update-profile/{id}', [App\Http\Controllers\Front\Profile\EditController::class, 'update'])->name('UpdateProfile');

    Route::put('update-password', [App\Http\Controllers\Front\Profile\PasswordController::class, 'update'])->name('UpdatePassword');
    Route::put('change-avatar', [App\Http\Controllers\Front\Profile\HomeController::class, 'ChangeProfilePic'])->name('ChangeAvatar');

    Route::get('survey/{id}', [App\Http\Controllers\Front\Profile\SurveyController::class, 'main'])->name('Survey');
    Route::put('fill-survey/{id}', [App\Http\Controllers\Front\Profile\SurveyController::class, 'update'])->name('FillSurvey');


    Route::post('add-favorite/{id}', [App\Http\Controllers\Front\FavoriteController::class, 'Favorite'])->name('Favorite');
    Route::get('favorites', [App\Http\Controllers\Front\FavoriteController::class, 'main'])->name('MyFavorites');
    Route::get('favorites/count', [App\Http\Controllers\Front\FavoriteController::class, 'count']);

});
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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






Route::get('/products', [App\Http\Controllers\API\Products::class, 'main']);
Route::get('/product/{id}', [App\Http\Controllers\API\Products::class, 'getId']);
Route::get('/country', [App\Http\Controllers\API\MoreController::class, 'country']);
Route::get('/test', [App\Http\Controllers\API\MoreController::class, 'test']);
Route::get('/categories', [App\Http\Controllers\Front\CategoryController::class, 'getCategories']);




// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

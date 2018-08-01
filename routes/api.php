<?php

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

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
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::apiResource('/user', 'API\UserController');
Route::apiResource('/boozetype', 'API\BoozeTypesController');
Route::apiResource('/carts', 'API\CartsController');
Route::apiResource('/contact-us', 'API\ContactUseController');
Route::apiResource('/news', 'API\NewsController');
Route::apiResource('/product', 'API\ProductController');
Route::apiResource('/product-rating', 'API\ProductRatingController');
Route::apiResource('/roles', 'API\RolesController');
Route::apiResource('/transaction', 'API\TransactionController');
Route::apiResource('/wishlist', 'API\WishlistController');

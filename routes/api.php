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


// Public
Route::post('/auth/register', 'API\PassportController@register');
Route::post('/auth/login', 'API\PassportController@login');
Route::post('/auth/forgot-password', 'API\ForgotPasswordController@sendResetLink');
Route::apiResource('/contact-us', 'API\ContactUsController');

Route::group(['middleware' => ['auth:api']], function(){

	Route::post('/auth/change-password', 'API\PassportController@changePassword');
	Route::apiResource('/user', 'API\UserController');
	Route::apiResource('/boozetype', 'API\BoozeTypesController');
	Route::apiResource('/carts', 'API\CartsController');
	Route::apiResource('/news', 'API\NewsController');
	Route::apiResource('/product', 'API\ProductsController');
	Route::apiResource('/product-rating', 'API\ProductRatingController');
//Route::apiResource('/roles', 'API\RolesController');
	Route::apiResource('/transaction', 'API\TransactionController');
	Route::apiResource('/wishlist', 'API\WishlistController');
});


<?php

use Illuminate\Support\Facades\Auth;
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

// public
Route::get('/', 'LandingController@index');
Auth::routes();
Route::get('/register-seller', 'LandingController@registerSeller');
Route::resource('/help', 'ContactUsController');
Route::post('/ageCheck', 'LandingController@ageChecker');

// Shared auth middleware group
	Route::group(['middleware' => ['auth']], function () {

	// Shared pages
	Route::get('/index', 'Shared\IndexController@index')->name('index');
	Route::get('/about', 'Shared\AboutController@index');
	Route::resource('/contact-us', 'ContactUsController');
	Route::get('/news', 'Shared\NewsController@index');
	Route::get('/news/{id}', 'Shared\NewsController@details');
	Route::get('/booze', 'Shared\BoozeController@index');
	Route::resource('/products', 'Shared\ProductsController');
	Route::post('/modal/review', 'Shared\ProductRatingsController@store');
	Route::resource('/carts', 'Shared\CartsController');

	Route::resource('/profile', 'Shared\ProfileController');
	Route::get('/change-password', 'Shared\ProfileController@show_change_password_form');
	Route::post('/change-password', 'Shared\ProfileController@change_password');
	Route::resource('/wishlist', 'Shared\WishlistController');
	Route::resource('/transaction', 'Shared\TransactionsController');

	if (Auth::user() != 2 ) {
		Route::resource('/inventory', 'Shared\InventoryController');
	}



	// Admin pages
	Route::get('/admin', 'Admin\IndexController@index');
	Route::resource('/admin/user', 'Admin\UserController');
	Route::resource('/admin/news', 'Admin\NewsController');
	Route::resource('/admin/booze', 'Admin\BoozeTypesController');
	Route::resource('/admin/products', 'Admin\ProductsController');


});

// seller
Route::group(['middleware' => ['auth', 'seller']], function () {

	Route::resource('/inventory', 'Shared\InventoryController');

});

// admin
Route::group(['middleware' => ['auth', 'admin']], function () {

	// Admin pages
	Route::get('/admin', 'Admin\IndexController@index');
	Route::resource('/admin/user', 'Admin\UserController');
	Route::resource('/admin/news', 'Admin\NewsController');
	Route::resource('/admin/booze', 'Admin\BoozeTypesController');
	Route::resource('/admin/products', 'Admin\ProductsController');

});

<?php

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

	
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

	Route::get('logout', function(){
		Auth::logout();
		return redirect(url("login"));
	})->name('logout');

	Route::group(['prefix' => 'category'], function() {
		Route::get('list', 'AdminCategoryController@getList');

		Route::get('add', 'AdminCategoryController@getAdd');
		Route::post('add', 'AdminCategoryController@postAdd');

		Route::get('edit/{id}', 'AdminCategoryController@getEdit');
		Route::post('edit/{id}', 'AdminCategoryController@postEdit');

		Route::get('delete/{id}', 'AdminCategoryController@getDelete');
	});

	Route::group(['prefix' => 'category-detail'], function() {
		Route::get('list', 'AdminCategoryDetailController@getList');

		Route::get('add', 'AdminCategoryDetailController@getAdd');
		Route::post('add', 'AdminCategoryDetailController@postAdd');

		Route::get('edit/{id}', 'AdminCategoryDetailController@getEdit');
		Route::post('edit/{id}', 'AdminCategoryDetailController@postEdit');

		Route::get('delete/{id}', 'AdminCategoryDetailController@getDelete');
	});

	Route::group(['prefix' => 'product'], function() {
		Route::get('list', 'AdminProductController@getList');

		Route::get('add', 'AdminProductController@getAdd');
		Route::post('add', 'AdminProductController@postAdd');

		Route::get('edit/{id}', 'AdminProductController@getEdit');
		Route::post('edit/{id}', 'AdminProductController@postEdit');

		Route::get('delete/{id}', 'AdminProductController@getDelete');
	});
	
	Route::group(['prefix' => 'news'], function() {
		Route::get('list', 'AdminNewsController@getList');

		Route::get('add', 'AdminNewsController@getAdd');
		Route::post('add', 'AdminNewsController@postAdd');

		Route::get('edit/{id}', 'AdminNewsController@getEdit');
		Route::post('edit/{id}', 'AdminNewsController@postEdit');

		Route::get('delete/{id}', 'AdminNewsController@getDelete');
	});

	Route::group(['prefix' => 'user', 'middleware' => 'level'], function() {
		Route::get('list', 'AdminUserController@getList');

		Route::get('add', 'AdminUserController@getAdd');
		Route::post('add', 'AdminUserController@postAdd');

		Route::get('edit/{id}', 'AdminUserController@getEdit');
		Route::post('edit/{id}', 'AdminUserController@postEdit');

		Route::get('delete/{id}', 'AdminUserController@getDelete');
	});

	Route::group(['prefix' => 'customer'], function() {
		Route::get('list', 'AdminCustomerController@getList');

		Route::get('order/{id}', 'AdminCustomerController@getOrder');
		Route::get('update/{id}', 'AdminCustomerController@updateOrder');

		Route::get('delete/{id}', 'AdminCustomerController@getDelete');
	});

	Route::group(['prefix' => 'ajax'], function() {
		Route::get('category-detail/{pk_category_detail_id}', 'AdminAjaxController@getCategoryDetail');
	});

});

Route::get('', 'HomeClientController@index');
Route::get('gioi-thieu', 'ExtraController@getIntroduct');
Route::get('lien-he', 'ExtraController@getContact');
Route::get('thuong-hieu', 'ExtraController@getTrademark');
Route::get('khuyen-mai', 'ExtraController@getTrademark');

Route::get('san-pham', 'DetailController@getAllProduct');
Route::get('san-pham/{type_id}/{type}', 'DetailController@getProductType');
Route::get('san-pham/{type_detail_id}/{type}/{type_detail}', 'DetailController@getProductTypeDetail');
Route::get('chi-tiet/{product_id}/{name}', 'DetailController@getProductDetail');
Route::get('tin-tuc', 'DetailController@getNewses');
Route::get('tin-tuc/{news_id}/{news_title}', 'DetailController@getNews');
Route::get('tim-kiem', 'DetailController@getSearch');

Route::get('gio-hang', 'CartController@getCart');
Route::post('gio-hang/add/{product_id}', 'CartController@addCart');
Route::post('gio-hang', 'CartController@updateCart');
Route::get('gio-hang/delete/{product_id}', 'CartController@deleteCart');
Route::get('gio-hang/delete-purchased/{customer_id}', 'CartController@deletePurchased');
Route::get('gio-hang/destroy', 'CartController@destroyCart');

Route::get('dang-xuat', 'ExtraController@getLogout');

Route::get('api', 'ApiController@getProduct');
Route::get('cart/{cart_number}/{cart_price}/{id}/{number}', 'AjaxController@getCart');
Route::post('login-client', 'AjaxController@login');
Route::post('signup-client', 'AjaxController@signup');
Route::post('forget-pass', 'AjaxController@forgetPass');
Route::post('reset-pass', 'AjaxController@resetPass');
Route::get('checkout', 'AjaxController@getCheckout');
Route::post('checkout', 'AjaxController@postCheckout');

Route::get('mail/{id}/{user}/{pass}', 'ExtraController@verifyMail');
Route::get('mail-reset-pass/{user}', 'ExtraController@resetPass');



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


Route::get('/login', 'logincon@index')->name('login.index');
Route::post('/login', 'logincon@verify');


Route::get('/musicshop', 'DashboardController@index')->name('dashboard.index');
Route::post('/musicshop', 'DashboardController@search');

Route::post('/add', 'CartController@AddDelete')->name('cart.add.delete');

Route::get('/product/names', 'productcon@giveNames')->name('product.names');

Route::get('/catagory/{catagory}','DashboardController@ShowCatagory')->name('catagory.show');
Route::post('/catagory/{catagory}','DashboardController@search');


Route::group(['middleware' => ['user']], function(){

	Route::get('/count/notifications', 'NotificationController@index')->name('notifications.index');
	Route::get('/give/notifications', 'NotificationController@giveNotification')->name('notifications.give');

	Route::get('/signup', 'signupcon@index')->name('signup.index');
	Route::post('/signup', 'signupcon@store')->name('signup.store');
	Route::get('/product', 'productcon@index')->name('product.index');
	Route::post('/product', 'productcon@search');
	Route::get('/product/stockout', 'productcon@StockOut')->name('product.stockout');
	Route::get('/product/show/{id}', 'productcon@show')->name('product.show');
	Route::get('/products/{catagory}','productcon@ShowCatagory')->name('show.catagory');
	Route::post('/products/{catagory}','productcon@search');
	Route::get('/product/create', 'productcon@create')->name('product.create');
	Route::post('/product/create', 'productcon@store')->name('product.store');
	Route::get('/product/edit/{id}', 'productcon@edit')->name('product.edit');
	Route::post('/product/edit/{id}', 'productcon@update')->name('product.update');
	Route::get('/product/delete/{id}', 'productcon@delete')->name('product.delete');
	
	Route::post('/product/changeimage/{id}', 'productcon@ChangeImage')->name('product.image');
	Route::get('/orders', 'AdminOrderController@AllOrders')->name('orders.all');
	Route::get('/orders/derlivered', 'AdminOrderController@delivered')->name('orders.delivered');
	Route::get('/orders/notdelivered', 'AdminOrderController@NotDelivered')->name('orders.notdelivered');
	Route::get('/order/{id}', 'AdminOrderController@order')->name('order.view');
	Route::get('/deliver/order/{id}', 'AdminOrderController@deliver')->name('order.deliver');
	Route::get('/sells', 'SalesController@sales')->name('user.sales');
	Route::get('/add/admin', 'AddAdminController@index')->name('user.addAdmin');
	Route::post('/add/admin', 'AddAdminController@verify');
	Route::post('/sells', 'SalesController@show');
	Route::get('/logout', 'logoutcon@index')->name('logout.index');

});


Route::group(['middleware' => ['order']], function(){

	Route::get('/show', 'CartController@show')->name('showCart');

	Route::get('/order', 'OrderController@index')->name('order.index');

	Route::post('/order', 'OrderController@verify');

});


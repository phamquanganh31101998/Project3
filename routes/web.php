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

Route::get('/welcome', function () {
    return view('welcome');
})->name('index');

Route::get('/', 'HomeController@trangchu')->name('homepage');

Route::get('app', function(){
	return view('layouts.app');
});
//user
Route::get('user/index', ['as' => 'user.index', 'uses' => 'UserController@index']);

Route::get('user/create', ['as' =>'user.create', 'uses' => 'RegisterController@create']);

Route::post('user/index', ['as' =>'user.store', 'uses' => 'RegisterController@store']);

Route::get('user/index/{id}', ['as' =>'user.show', 'uses' => 'UserController@show']);

Route::get('user/index/{user_id}/ChangeStatus', ['as'=>'user.status', 'uses' => 'UserController@changeStatus']);

Route::post('user/search', ['as'=>'user.search', 'uses'=>'UserController@search']);

Route::get('user/account', ['as' => 'user.account', 'uses'=>'UserController@showPersonalAccount']);

Route::get('user/account/{id}/edit', ['as' => 'user.edit', 'uses'=>'UserController@edit']);

Route::post('user/account/{id}/update', ['as' => 'user.update', 'uses'=>'UserController@update']);

Route::delete('user/{id}', ['as' => 'user.destroy', 'uses' => 'UserController@destroy']);

//feedback
Route::get('feedback/index', ['as' => 'feedback.index', 'uses' => 'FeedbackController@index']);

Route::get('feedback/index/{id}', ['as' =>'feedback.show', 'uses' => 'FeedbackController@show']);

Route::post('feedback/index/{id}/update', ['as' =>'feedback.update', 'uses' => 'FeedbackController@update']);

Route::get('feedback', ['as' => 'feedback.showForCustomer', 'uses' => 'FeedbackController@showForCustomer']);

Route::get('feedback/showForm', ['as' => 'feedback.showForm', 'uses' => 'FeedbackController@showForm']);

Route::post('feedback/send/{id}', ['as' => 'feedback.send', 'uses' => 'FeedbackController@send']);

//product

Route::get('product/index', ['as'=>'product.index', 'uses'=>'ProductController@index']);

Route::get('product/index/{id}', ['as'=>'product.show', 'uses'=>'ProductController@show']);

Route::get('product/create', ['as'=>'product.create', 'uses'=>'ProductController@create']);

Route::post('product/index', ['as' =>'product.store', 'uses' => 'ProductController@store']);

Route::get('product/edit/{id}', ['as'=>'product.edit', 'uses'=> 'ProductController@edit']);

Route::post('product/edit/{id}/update', ['as'=>'product.update', 'uses'=> 'ProductController@update']);

Route::get('product/search', ['as'=>'product.search', 'uses'=>'ProductController@search']);

Route::delete('product/{id}', ['as' => 'product.destroy', 'uses' => 'ProductController@destroy']);

Route::get('product/category', ['as'=>'product.category', 'uses' => 'ProductController@category']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//cart
Route::get('cart/index', ['as'=>'cart.index', 'uses' => 'CartController@index']);

Route::post('cart/add', ['as'=>'cart.add', 'uses' => 'CartController@add']);

Route::post('cart/changeAmount/{id}', ['as'=>'cart.changeAmount', 'uses' => 'CartController@changeAmount']);

Route::get('cart/deleteProduct/{id}', ['as'=>'cart.deleteProduct', 'uses' => 'CartController@deleteProduct']);

Route::get('cart/deleteCart/{id}', ['as'=>'cart.deleteCart', 'uses' => 'CartController@deleteCart']);

//order
Route::post('order/create', ['as' => 'order.create', 'uses'=>'OrderController@create']);

Route::get('order/index', ['as' => 'order.index', 'uses'=>'OrderController@index']);

Route::get('order/index/{id}', ['as' => 'order.show', 'uses'=>'OrderController@show']);

Route::get('order/index/{id}/accept', ['as' => 'order.accept', 'uses'=>'OrderController@accept']);

Route::get('order/index/{id}/cancel', ['as' => 'order.cancel', 'uses'=>'OrderController@cancel']);

Route::post('order/search', ['as' => 'order.search', 'uses'=>'OrderController@search']);

Route::get('order/indexForCustomer', ['as' => 'order.indexForCustomer', 'uses'=>'OrderController@indexForCustomer']);

Route::get('order/indexForCustomer/{id}', ['as' => 'order.showForCustomer', 'uses'=>'OrderController@showForCustomer']);

//discount
Route::get('discount/index', ['as' => 'discount.index', 'uses'=>'DiscountController@index']);

Route::post('discount/create', ['as' => 'discount.create', 'uses'=>'DiscountController@create']);

Route::get('discount/delete/{id}', ['as' => 'discount.delete', 'uses'=>'DiscountController@delete']);
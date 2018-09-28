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


Route::get('/','IndexController@shop')->name('shop');

Route::get('cart','IndexController@insertcart')->name('cart')->middleware('auth');
Route::get('cartpage','CartController@cartpage')->name('cartpage')->middleware('auth','CheckShipping');
Route::get('checkout','CartController@checkout')->name('checkout')->middleware('auth','CheckShipping');
Route::get('buy', 'CartController@buy')->name('buy')->middleware('auth');

Route::get('crudincrement/{id}','CrudController@increment')->name('crudincrement');
Route::get('cruddecrement/{id}','CrudController@decrement')->name('cruddecrement');
Route::get('cruddelete/{id}','CrudController@destroy')->name('cruddelete')->middleware('auth');

Route::get('insertproduct','IndexController@controlpage')->middleware('auth');
Route::post('store','IndexController@insertproduct')->middleware('auth');
Route::post('update','IndexController@updateproduct')->middleware('auth');

Auth::routes();
Route::get('/home', 'IndexController@shop')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

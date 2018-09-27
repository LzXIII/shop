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
Route::get('cart','IndexController@insertcart')->name('cart');
Route::get('cartpage','CartController@cartpage')->name('cartpage');
Route::get('checkout','CartController@checkout')->name('checkout');
Route::get('crudincrement/{id}','CrudController@increment')->name('crudincrement');
Route::get('cruddecrement/{id}','CrudController@decrement')->name('cruddecrement');
Route::get('cruddelete/{id}','CrudController@destroy')->name('cruddelete');

Route::view('insertproduct','insertproduct');
Route::post('store','IndexController@insertproduct');

Route::get('buy', 'CartController@buy')->name('buy');

Auth::routes();

Route::get('/home', 'IndexController@shop')->name('home');

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'ItemController@getIndex');
Route::get('preke/{slug}', 'ItemController@getItem');
Route::get('kategorija/{slug}', 'ItemController@getItemCategory');

Route::get('krepselis', 'CartController@getIndex');
Route::get('kontaktine-informacija', 'CartController@getContactInformation');
Route::post('kontaktine-informacija', 'CartController@postContactInformation');
Route::get('uzsakymas/{id}', 'CartController@getOrder');
Route::get('prideti/{id}', 'CartController@addItem');
Route::get('atnaujinti/{id}/{amount}', 'CartController@updateAmount');
Route::get('ismesti/{id}', 'CartController@removeItem');

Route::get('patvirtinimas/{id}', 'PayController@getConfirm');
Route::get('callback', 'PayController@getCallback');
Route::get('accept', 'PayController@getAccept');
Route::get('cancel', 'PayController@getCancel');

// Admin
Route::get('admin', 'Admin\MainController@getIndex');
Route::resource('admin/kategorijos', 'Admin\CategoryController');
Route::resource('admin/prekes', 'Admin\ItemController');
Route::resource('admin/uzsakymai', 'Admin\OrderController');
Route::get('admin/slug/{string}', 'Admin\MainController@getSlugName');

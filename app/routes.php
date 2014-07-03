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
Route::get('patvirtinimas/{id}', 'CartController@getConfirm');
Route::post('patvirtinimas/{id}', 'CartController@postConfirm');
Route::get('uzsakymas/{id}', 'CartController@getOrder');
Route::get('prideti/{id}', 'CartController@getAddItem');
Route::get('ismesti/{id}', 'CartController@getRemoveItem');
Route::get('atnaujinti/{id}/{kiekis}', 'CartController@getUpdateAmount');

// Admin
Route::get('admin', 'Admin\MainController@getIndex');
Route::resource('admin/kategorijos', 'Admin\CategoryController');
Route::resource('admin/prekes', 'Admin\ItemController');
Route::resource('admin/uzsakymai', 'Admin\OrderController');
Route::get('admin/slug/{string}', 'Admin\MainController@getSlugName');

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

Route::get('/', 'PrekesController@getIndex');
Route::get('preke/{slug}', 'PrekesController@getPreke');
Route::get('kategorija/{slug}', 'PrekesController@getPrekesKategorija');
Route::get('krepselis', 'KrepselisController@getIndex');
Route::get('kontaktine-informacija', 'KrepselisController@getKontaktineInformacija');
Route::post('kontaktine-informacija', 'KrepselisController@postKontaktineInformacija');
Route::get('patvirtinimas/{id}', 'KrepselisController@getPatvirtinimas');
Route::post('patvirtinimas/{id}', 'KrepselisController@postPatvirtinimas');
Route::get('uzsakymas/{id}', 'KrepselisController@getUzsakymas');
Route::get('kontaktai', 'BaseController@getKontaktai');
Route::get('prideti/{id}', 'KrepselisController@getPridetiPreke');
Route::get('ismesti/{id}', 'KrepselisController@getIsmestiPreke');
Route::get('atnaujinti/{id}/{kiekis}', 'KrepselisController@getAtnaujintiKieki');

// Admin
Route::get('admin', 'Admin\MainController@getIndex');
Route::resource('admin/kategorijos', 'Admin\KategorijosController');
Route::resource('admin/prekes', 'Admin\PrekesController');
Route::resource('admin/uzsakymai', 'Admin\UzsakymaiController');
Route::get('admin/slug/{string}', 'Admin\MainController@getSlugName');
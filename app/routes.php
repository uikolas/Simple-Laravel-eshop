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
Route::get('uzsakymas', 'KrepselisController@getUzsakymas');
Route::post('uzsakymas', 'KrepselisController@postUzsakymas');
Route::get('kontaktai', 'BaseController@getKontaktai');
Route::get('prideti/{id}', 'KrepselisController@getPridetiPreke');
Route::get('ismesti/{id}', 'KrepselisController@getIsmestiPreke');
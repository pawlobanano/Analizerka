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

Route::get('/', 'AnalizerController@index');

Route::get('login', 'AnalizerController@login');
Route::get('logowanie', 'AnalizerController@login');

Route::get('logout', 'AnalizerController@logout');
Route::get('wyloguj', 'AnalizerController@logout');

Route::get('register', 'AnalizerController@register');
Route::get('rejestracja', 'AnalizerController@register');

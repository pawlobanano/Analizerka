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

Route::post('login', ['as'   => 'user.login',
                      'uses' => 'UserController@login'
]);
Route::post('logout', ['as'   => 'user.logout',
                       'uses' => 'UserController@logout'
]);
Route::get('register', ['as'   => 'user.register',
                        'uses' => 'UserController@register'
]);

Route::resource('/', 'AnalyzerController');
Route::resource('user', 'UserController');
Route::resource('expense', 'ExpenseController');
Route::resource('image', 'ImageController', ['only' => ['destroy']]);

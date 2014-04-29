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

Route::get('/user-przez-expense', function()
{
    $user = Expense::find(1)->user;

    return $user;
});

Route::get('/category-przez-expense', function()
{
    $category = Expense::find(1)->category;

    return $category;
});

Route::get('/user-przez-monthly_income', function()
{
    $user = MonthlyIncome::find(1)->user;

    return $user;
});

Route::get('/month-przez-monthly_income', function()
{
    $month = MonthlyIncome::find(1)->month;

    return $month;
});

Route::get('users', function()
{
    $users = User::all();

    return View::make('users')->with('users', $users);
});

Route::get('logowanie', 'AnalizerController@login');

Route::get('rejestracja', 'AnalizerController@register');

Route::get('/', 'AnalizerController@home');

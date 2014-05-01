<?php

class AnalizerController extends BaseController
{

    public function login()
    {
        return View::make('user.login');
    }

    public function register()
    {
        return View::make('user.register');
    }

    public function index()
    {
        // Table
        // Last n expenses
        $expenses = DB::table('expenses')->groupBy('id')->take(5)->get();
//        var_dump($expenses);

        return View::make('analizer.index', ['expenses' => $expenses]);
    }
}

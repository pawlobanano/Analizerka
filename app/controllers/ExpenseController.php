<?php

class ExpenseController extends \BaseController
{

    /**
     * Display a listing of the expense.
     *
     * @return Response
     */
    public function index()
    {
        $expenses = Expense::all();

        return View::make('expense.index', ['expenses' => $expenses]);
    }


    /**
     * Show the form for creating a new expense.
     *
     * @return Response
     */
    public function create()
    {
        /*$categories = Category::orderBy('id', 'asc')->lists('name');*/
        $categories = Category::orderBy('name', 'asc')->lists('name', 'id');

        return View::make('expense.create', ['categories' => $categories]);
    }


    /**
     * Store a newly created expense in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Expense::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Expense::create($data);

        return Redirect::route('expense.index');
    }


    /**
     * Display the specified expense.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $expense = Expense::findOrFail($id);

        return View::make('expense.show', ['expense' => $expense]);
    }


    /**
     * Show the form for editing the specified expense.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified expense in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified expense from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}

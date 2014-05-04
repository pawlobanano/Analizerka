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
        $validator = Validator::make(Input::all(), Expense::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $expense              = new Expense;
        $expense->user_id     = Input::get('user_id');
        $expense->date        = new DateTime(Input::get('date'));
        $expense->category_id = Input::get('category_id');
        $value                = str_replace(',', '.', Input::get('value'));
        $expense->value       = number_format($value, 2, '.', '');;
        $expense->comment = Input::get('comment');
        $expense->save();

        Session::flash('message', 'Successfully created expense!');

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
        $categories = Category::orderBy('name', 'asc')->lists('name', 'id');
        $expense    = Expense::find($id);

        return View::make('expense.edit', [
            'categories' => $categories,
            'expense'    => $expense
        ]);
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
        $validator = Validator::make(Input::all(), Expense::$rules);

        if ($validator->fails()) {
            return Redirect::route('expense.edit', $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            $expense              = Expense::find($id);
            $expense->user_id     = Input::get('user_id');
            $expense->date        = new DateTime(Input::get('date'));
            $expense->category_id = Input::get('category_id');
            $value                = str_replace(',', '.', Input::get('value'));
            $expense->value       = number_format($value, 2, '.', '');;
            $expense->comment = Input::get('comment');
            $expense->save();

            Session::flash('message', 'Successfully updated expense!');

            return Redirect::route('expense.index');
        }
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

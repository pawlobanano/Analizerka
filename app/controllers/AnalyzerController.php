<?php

class AnalyzerController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // listen to the queries and output them to learn!
        Event::listen('illuminate.query', function ($sql) {
            var_dump($sql);
        });
        echo '<br><br><br><br>';

        $expenses = Expense::all();

        return View::make('analyzer.index', compact('expenses'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('analyzer.expenseCreate');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // listen to the queries and output them to learn!
        Event::listen('illuminate.query', function ($sql) {
            var_dump($sql);
        });
        echo '<br><br><br><br>';

        $expense          = new Expense();
        $expense->value   = Input::get('value');
        $expense->comment = Input::get('comment');
        $expense->save();


        $input = Input::all();
        var_dump($input);

        return Redirect::route('expensesList');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        return View::make('analyzer.edit');
    }


    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
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


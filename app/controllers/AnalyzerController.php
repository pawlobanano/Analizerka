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
        // Wszystkie wydatki z bieżącego miesiąca zsumowane i odjęte od przychodu w tym miesiącu
        // dla danego użytkownika
        $user_id   = 1;
        $currYear  = date("Y");
        $currMonth = date("m");
        $startDate = $currYear . '-' . $currMonth . '-' . 01;
        $endDate   = $currYear . '-' . $currMonth . '-' . 31;

        $currentMonthBalance = DB::table('expenses')
            ->whereBetween('date', [
                $startDate,
                $endDate
            ])
            ->having('user_id', '=', $user_id)
            ->get();

//        dd($currentMonthBalance);

        return View::make('analyzer.index')->with([
            'currentMonthBalance' => $currentMonthBalance,
            'dataTables'          => false
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
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


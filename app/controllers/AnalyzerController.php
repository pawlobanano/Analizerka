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
        /**
         * Wszystkie wydatki z bieżącego miesiąca dla danego użytkownika
         * zsumowane i odjęte od przychodów tego miesiąca
         *
         * @todo $user_id set from currently logged in user
         */
        $user_id   = 1;
        $currYear  = date("Y");
        $currMonth = date("m");
        $startDate = $currYear . '-' . $currMonth . '-' . '01';
        $endDate   = $currYear . '-' . $currMonth . '-' . 31;


        // Kategorie danego użytkownika
        $categories = Category::where('user_id', $user_id)->lists('id', 'name');
//        dd($categories);


        // Wydatki danego miesiąca
        // danego użytkownika
        // z daną kategorią
        $CatTotal[] = [];
        foreach ($categories as $catName => $catId) {
//            dd($catName);
            $expenses = Expense::with('category')
                ->where('user_id', $user_id)
                ->whereHas('category', function($q) use ($catId) {
                    $q->where('id', $catId);
                })
                ->whereBetween('date', [
                    $startDate,
                    $endDate
                ])->get();
//            dd($expenses);


            // wydatek z daną kategorią (obrabianą obecnie przez foreach)
            foreach ($expenses as $key => $expense) {
//                dd($category);
                $CatTotal[$catName][$key] = $expense->value;
            }// Many expenses in one category
//            dd($CatTotal);

        }// One category per loop
//        dd($CatTotal);
//        dd($category);


        // Sumowanie wydatków w poszczególnych kategoriach



//        $wynik[] = [];
//        // Dla każdego wyniku sprawdzić kategorię i budować jej sumę
//        foreach ($expenses as $expense) {
////            dd($expense->category->name);
//            foreach ($expense->category->name as $category) {
//                $wynik[] = $category;
//            }
//        }
//        $total = Expense::with('categories')->sum('value');
////        dd($wynik);

        return View::make('analyzer.index')->with([
//            'currMonthBalance' => $currMonthBalance,
            'dataTables'       => false
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


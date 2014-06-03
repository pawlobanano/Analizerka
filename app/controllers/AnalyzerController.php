<?php

use Ghunti\HighchartsPHP\Highchart;
use Ghunti\HighchartsPHP\HighchartJsExpr;

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
        $month     = date("F");
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
                ->whereHas('category', function ($q) use ($catId) {
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
            }
            // Many expenses in one category
//            dd($CatTotal);

        }
        // One category per loop
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

        //This will create a highchart chart with the jquery js engine
        $chart = new Highchart();
        $chart->printScripts(true);// jQuery.js + Highchart.js

        $chart->chart->renderTo = "chart";
        $chart->chart->type = "bar";
        $chart->title->text = "Historic World Population by Region";
        $chart->subtitle->text = "Source: Wikipedia.org";
        $chart->xAxis->categories = array(
            'Africa',
            'America',
            'Asia',
            'Europe',
            'Oceania'
        );
        $chart->xAxis->title->text = null;
        $chart->yAxis->min = 0;
        $chart->yAxis->title->text = "Population (millions)";
        $chart->yAxis->title->align = "high";

        $chart->tooltip->formatter = new HighchartJsExpr(
            "function() {
            return '' + this.series.name +': '+ this.y +' millions';}");

        $chart->plotOptions->bar->dataLabels->enabled = 1;
        $chart->legend->layout = "vertical";
        $chart->legend->align = "right";
        $chart->legend->verticalAlign = "top";
        $chart->legend->x = - 100;
        $chart->legend->y = 100;
        $chart->legend->floating = 1;
        $chart->legend->borderWidth = 1;
        $chart->legend->backgroundColor = "#FFFFFF";
        $chart->legend->shadow = 1;
        $chart->credits->enabled = false;

        $chart->series[] = array(
            'name' => "Year 1800",
            'data' => array(
                107,
                31,
                635,
                203,
                2
            )
        );

        $chart->series[] = array(
            'name' => "Year 1900",
            'data' => array(
                133,
                156,
                947,
                408,
                6
            )
        );

        $chart->series[] = array(
            'name' => "Year 2008",
            'data' => array(
                973,
                914,
                4054,
                732,
                34
            )
        );

        return View::make('analyzer.index')->with([
            'month'      => $month,
            'chart'      => $chart,
            //            'currMonthBalance' => $currMonthBalance,
            'dataTables' => false
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


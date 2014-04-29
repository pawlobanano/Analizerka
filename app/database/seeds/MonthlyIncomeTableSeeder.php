<?php

class MonthlyIncomeTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('monthly_incomes')->truncate();

        $monthlyIncomes = [
            [
                'user_id' => '3',
                'month_id' => '2',
                'value' => '600.00',
                'year' => '2014',
            ],
            [
                'user_id' => '2',
                'month_id' => '2',
                'value' => '150.00',
                'year' => '2014',
            ],
            [
                'user_id' => '1',
                'month_id' => '2',
                'value' => '1900.00',
                'year' => '2014',
            ]
        ];

        foreach ($monthlyIncomes as $monthlyIncome) {
            MonthlyIncome::create($monthlyIncome);
        }
    }

}

<?php

class MonthlyIncomeTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('monthly_incomes')->delete();

        $monthlyIncomes = [
            [
                'user_id' => '1',
                'month_id' => '5',
                'value' => '600.00',
                'year' => '2014',
            ],
            [
                'user_id' => '1',
                'month_id' => '6',
                'value' => '150.00',
                'year' => '2014',
            ],
            [
                'user_id' => '1',
                'month_id' => '7',
                'value' => '1900.00',
                'year' => '2014',
            ]
        ];

        foreach ($monthlyIncomes as $monthlyIncome) {
            MonthlyIncome::create($monthlyIncome);
        }
    }

}

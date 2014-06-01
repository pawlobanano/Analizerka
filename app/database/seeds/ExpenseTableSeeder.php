<?php

class ExpenseTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('expenses')->delete();

        $date = new DateTime;

        $expenses = [
            [
                'user_id'     => '3',
                'category_id' => '3',
                'date'        => $date,
                'value'       => '34.66',
                'comment'     => '',
                'created_at'  => '2014-01-02 08:00:00'
            ],
            [
                'user_id'     => '2',
                'category_id' => '2',
                'date'        => $date,
                'value'       => '14.99',
                'comment'     => 'Taki tam... komentarz',
                'created_at'  => '2014-01-04 09:00:00'
            ],
            [
                'user_id'     => '1',
                'category_id' => '1',
                'date'        => $date,
                'value'       => '7.29',
                'comment'     => '',
                'created_at'  => '2014-01-07 10:00:00'
            ],
            [
                'user_id'     => '1',
                'category_id' => '1',
                'date'        => $date,
                'value'       => '51.29',
                'comment'     => '',
                'created_at'  => '2014-01-12 11:00:00'
            ],
            [
                'user_id'     => '1',
                'category_id' => '2',
                'date'        => $date,
                'value'       => '4.29',
                'comment'     => '',
                'created_at'  => '2014-01-14 12:00:00'
            ],
            [
                'user_id'     => '1',
                'category_id' => '3',
                'date'        => $date,
                'value'       => '48.29',
                'comment'     => '',
                'created_at'  => '2014-01-17 13:00:00'
            ],
            [
                'user_id'     => '1',
                'category_id' => '3',
                'date'        => $date,
                'value'       => '84.29',
                'comment'     => 'Kocham kino!',
                'created_at'  => '2014-01-20 14:00:00'
            ]
        ];

        foreach ($expenses as $expense) {
            Expense::create($expense);
        }
    }

}

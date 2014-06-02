<?php

class ExpenseTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('expenses')->delete();

        $date = new DateTime;

        $expenses = [
            [
                'user_id'     => '1',
                'category_id' => '4',
                'date'        => '2014-06-25',
                'value'       => '25.25',
                'comment'     => '<3',
                'created_at'  => '2014-01-02 08:00:00'
            ],
            [
                'user_id'     => '1',
                'category_id' => '3',
                'date'        => '2014-06-14',
                'value'       => '14.14',
                'comment'     => '!',
                'created_at'  => '2014-01-02 08:00:00'
            ],
            [
                'user_id'     => '1',
                'category_id' => '2',
                'date'        => '2014-06-09',
                'value'       => '19.09',
                'comment'     => 'nic!',
                'created_at'  => '2014-01-02 08:00:00'
            ],
            [
                'user_id'     => '1',
                'category_id' => '1',
                'date'        => '2014-06-04',
                'value'       => '11.11',
                'comment'     => 'A nie napiszę nic!',
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
                'date'        => '2014-05-23',
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

<?php

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('UserTableSeeder');
        $this->call('MonthTableSeeder');
        $this->call('CategoryTableSeeder');
        $this->call('ImageTableSeeder');
        $this->call('ExpenseTableSeeder');
        $this->call('MonthlyIncomeTableSeeder');
    }

}

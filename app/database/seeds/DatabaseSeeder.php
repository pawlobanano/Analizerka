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
//        Eloquent::unguard();//In case there are some problems with mass assign

        $this->call('UserTableSeeder');
        $this->call('MonthTableSeeder');
        $this->call('CategoryTableSeeder');
        $this->call('ImageTableSeeder');
        $this->call('ExpenseTableSeeder');
        $this->call('MonthlyIncomeTableSeeder');
    }

}

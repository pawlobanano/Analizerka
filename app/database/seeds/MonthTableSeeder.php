<?php

class MonthTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('months')->delete();

        $months = [
            ['name' => 'Styczeń'],
            ['name' => 'Luty'],
            ['name' => 'Marzec'],
            ['name' => 'Kwiecień'],
            ['name' => 'Maj'],
            ['name' => 'Czerwiec'],
            ['name' => 'Lipiec'],
            ['name' => 'Sierpień'],
            ['name' => 'Wrzesień'],
            ['name' => 'Październik'],
            ['name' => 'Listopad'],
            ['name' => 'Grudzień']
        ];

        foreach ($months as $month) {
            Month::create($month);
        }
    }

}

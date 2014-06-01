<?php

class CategoryTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('categories')->delete();

        $categories = [
            [
                'name'    => 'Brak',
                'user_id' => 1
            ],
            [
                'name'    => 'Spożywczy',
                'user_id' => 1
            ],
            [
                'name'    => 'Zamawiane jedzenie',
                'user_id' => 1
            ],
            [
                'name'    => 'Kino',
                'user_id' => 1
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }

}

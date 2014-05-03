<?php

class CategoryTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('categories')->truncate();

        $categories = [
            ['name' => 'Brak'],
            ['name' => 'Spożywczy'],
            ['name' => 'Zamawiane jedzenie'],
            ['name' => 'Kino']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }

}

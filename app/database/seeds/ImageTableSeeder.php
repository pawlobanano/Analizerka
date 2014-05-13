<?php

class ImageTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('images')->delete();

        $images = [];

        foreach ($images as $image) {
            Image::create($image);
        }
    }
}

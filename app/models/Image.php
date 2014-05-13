<?php

class Image extends Eloquent
{
    public function expense()
    {
        return $this->belongsTo('Expense');
    }

    public static $rules = [
        'image' => 'mimes:jpeg,bmp,png|image|max:3000'
    ];
}

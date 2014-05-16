<?php

class Image extends Eloquent
{
    protected $guarded = [
        'id'
    ];

    public static $rules = [
        'image' => 'mimes:jpeg,bmp,png|image|max:3000'
    ];

    public function expense()
    {
        return $this->belongsTo('Expense');
    }
}

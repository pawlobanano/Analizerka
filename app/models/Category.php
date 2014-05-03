<?php

class Category extends Eloquent
{
    public function expenses()
    {
        return $this->hasMany('Expense');
    }

    public $timestamps = false;

    protected $guarded = [];
}

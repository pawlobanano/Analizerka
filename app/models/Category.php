<?php

class Category extends Eloquent
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function expenses()
    {
        return $this->hasMany('Expense');
    }
}

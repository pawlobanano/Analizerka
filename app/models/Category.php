<?php

class Category extends Eloquent
{
    public $timestamps = false;

    public function expenses()
    {
        return $this->hasMany('Expense');
    }
}

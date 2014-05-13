<?php

class Month extends Eloquent
{
    public $timestamps = false;

    public function monthly_incomes()
    {
        return $this->hasMany('monthly_incomes');
    }
}

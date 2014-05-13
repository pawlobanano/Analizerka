<?php

class Month extends Eloquent
{
    public function monthly_incomes()
    {
        return $this->hasMany('monthly_incomes');
    }

    public $timestamps = false;
}

<?php

class Month extends Eloquent
{
    protected $guarded = [
        'id'
    ];

    public $timestamps = false;

    public function monthly_incomes()
    {
        return $this->hasMany('monthly_incomes');
    }
}

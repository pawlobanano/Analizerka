<?php

class MonthlyIncome extends Eloquent
{

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function month()
    {
        return $this->belongsTo('Month');
    }
}

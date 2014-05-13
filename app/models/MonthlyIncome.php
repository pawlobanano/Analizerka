<?php

class MonthlyIncome extends Eloquent
{
    /**
     * Defines an inverse one-to-many relationship.
     *
     * @see http://laravel.com/docs/eloquent#one-to-many
     */
    public function user()
    {
        return $this->belongsTo('User');
    }

    /**
     * Defines an inverse one-to-many relationship.
     *
     * @see http://laravel.com/docs/eloquent#one-to-many
     */
    public function month()
    {
        return $this->belongsTo('Month');
    }
}

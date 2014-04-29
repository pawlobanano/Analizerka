<?php

class User extends Eloquent
{

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

//    public function expenses()
//    {
//        return $this->hasMany('Expense');
//    }
}

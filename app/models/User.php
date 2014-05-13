<?php

class User extends Eloquent
{
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    public static $rules = [
        'username' => 'required|unique',
        'password' => 'required|min:6',
        'email' => 'required|email'
    ];

    public function expenses()
    {
        return $this->hasMany('Expense');
    }
}

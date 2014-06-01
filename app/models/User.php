<?php

class User extends Eloquent
{
    protected $guarded = ['id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    public static $rules = [
        'login'    => 'required|unique',
        'password' => 'required|min:6',
        'email'    => 'required|email'
    ];

    public function expenses()
    {
        return $this->hasMany('Expense');
    }

    public function categories()
    {
        return $this->hasMany('Category');
    }

    public function images()
    {
        return $this->hasManyThrough('Image', 'Expense');
    }
}

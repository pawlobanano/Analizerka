<?php

class Expense extends Eloquent
{
    protected $guarded = [
        'id'
    ];

    public static $rules = [
        'user_id'     => 'required|integer',
        'date'        => 'required|date_format:d-m-Y',
        'category_id' => 'required|integer',
        'value'       => 'required|regex:/^[1-9]+(?:\,[0-9]{1,2}+)?$/',
        'comment'     => 'Max:255'
    ];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function image()
    {
        return $this->hasMany('Image');
    }

    public static function validate($input)
    {
        $expValidator = Validator::make($input, self::$rules);

        return $expValidator;
    }
}

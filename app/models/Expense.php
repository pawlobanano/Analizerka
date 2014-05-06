<?php

class Expense extends Eloquent
{
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function category()
    {
        return $this->belongsTo('Category');
    }

    protected $fillable = [
        'user_id',
        'date',
        'category_id',
        'value',
        'comment',
    ];

    public static $rules = [
        'user_id'     => 'required|integer',
        'date'        => 'required|date_format:"m-d-Y"',
        'category_id' => 'required|integer',
        'value'       => 'required|regex:/^[0-9]+(\,[0-9]{1,2}+)$/',
        'comment'     => 'Max:255',
    ];

}

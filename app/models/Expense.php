<?php

class Expense extends Eloquent
{
    protected $softDelete = true;

    protected $guarded = ['id'];

    public static $rules = [
        'user_id'     => 'required|integer',
        'date'        => 'required|date_format:d.m.Y',
        'category_id' => 'required|integer',
        'value'       => 'required|regex:/^[0-9]+(?:\,[0-9]{1,2}+)?$/',
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
}

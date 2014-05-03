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
        'comment' => 'required|Max:255|Alpha',
    ];

}

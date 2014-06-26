<?php

class Category extends \Eloquent {

    protected $fillable = [];

    public static $validationRules = [
        'name' => ['required', 'between:1,255']
    ];

    public function formulas()
    {
        return $this->hasMany('Formula');
    }
}
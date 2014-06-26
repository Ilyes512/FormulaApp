<?php

class Tag extends \Eloquent {

    protected $fillable = [];

    public static $validationRules = [
        'name' => ['required', 'max:255']
    ];

    public function Formulas()
    {
        return $this->belongsToMany('Formula')->withTimestamps();
    }
}
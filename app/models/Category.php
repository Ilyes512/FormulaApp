<?php

use LaravelBook\Ardent\Ardent;

class Category extends Ardent {

    public static $rules = [
        'name' => ['required', 'max:255', 'unique:categories']
    ];
    public static $relationsData = [
        'formulas' => [SELF::HAS_MANY, 'Formula']
    ];
    public $autoHydrateEntityFromInput = true; // hydrates whenever validation is called
    public $forceEntityHydrationFromInput = true; // hydrates on new entries' validation
    protected $fillable = ['name'];
}
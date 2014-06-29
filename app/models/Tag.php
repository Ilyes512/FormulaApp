<?php

use LaravelBook\Ardent\Ardent;

class Tag extends Ardent {

    public static $rules = [
        'name' => ['required', 'max:255', 'unique:tags']
    ];
    public static $relationsData = [
        'formulas' => [SELF::BELONGS_TO_MANY, 'Formula', 'timestamps' => true]
    ];
    public $autoHydrateEntityFromInput = true; // hydrates whenever validation is called
    public $forceEntityHydrationFromInput = true; // hydrates on new entries' validation
    protected $fillable = ['name'];
}
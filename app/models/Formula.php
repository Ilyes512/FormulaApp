<?php

use LaravelBook\Ardent\Ardent;

class Formula extends Ardent {

    public static $rules = [
        'name'        => ['required', 'max:255'],
        'category_id' => ['required', 'exists:categories,id'],
        'formula'     => ['required', 'max:21844', 'unique:formulas'],
        'info'        => 'max:21844',
        'tags'        => ['exists:tags,id']
    ];
    public static $relationsData = [
        'category' => [SELF::BELONGS_TO, 'Category'],
        'tags'     => [SELF::BELONGS_TO_MANY, 'Tag', 'timestamps' => true]
    ];
    public $autoHydrateEntityFromInput = true; // hydrates on new entries' validation
    public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
    protected $fillable = ['name', 'category_id', 'formula', 'info'];
}
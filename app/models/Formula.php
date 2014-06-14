<?php

class Formula extends \Eloquent {
	protected $fillable = [];

    public static $validationRules = [
        'name' => ['required', 'max:255'],
        'category' => ['required', 'exists:categories,id'],
        'formula' => ['required', 'max:21844'],
        'info' => 'max:21844',
        'tags' => ['exists:tags,id']
    ];

    public function category() {
        return $this->belongsTo('Category');
    }

    public function tags() {
        return $this->belongsToMany('Tag')->withTimestamps();
    }
}
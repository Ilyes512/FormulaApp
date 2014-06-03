<?php

class Formula extends \Eloquent {
	protected $fillable = [];

    public function category() {
        return $this->belongsTo('Category');
    }

    public function tags() {
        return $this->belongsToMany('Tag')->withTimestamps();
    }
}
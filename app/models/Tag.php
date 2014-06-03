<?php

class Tag extends \Eloquent {
	protected $fillable = [];

    public function Formulas() {
        return $this->belongsToMany('Formula')->withTimestamps();
    }
}
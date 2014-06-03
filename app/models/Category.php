<?php

class Category extends \Eloquent {
	protected $fillable = [];

    public function formulas() {
        return $this->hasMany('Formula');
    }
}
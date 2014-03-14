<?php

class Prekes extends Eloquent {

	protected $table = 'prekes';
	public $timestamps = false;

	public function kategorija() {
		return $this->belongsTo('Kategorijos');
	}
	
}
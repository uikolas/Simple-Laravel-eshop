<?php

class Kategorijos extends Eloquent {

	protected $table = 'kategorijos';
	public $timestamps = false;

	public function prekes(){
		return $this->hasMany('Prekes', 'kategorija_id');
	}

}
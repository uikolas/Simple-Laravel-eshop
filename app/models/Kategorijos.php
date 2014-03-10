<?php

class Kategorijos extends Eloquent {

	protected $table = 'kategorijos';
	public $timestamps = false;

	public function prekes(){
		return $this->hasMany('prekes', 'kategorija_id');
	}

}
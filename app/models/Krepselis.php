<?php

class Krepselis extends Eloquent {

	protected $table = 'krepselis';
	public $timestamps = false;
	
	public function preke() {
		return $this->belongsTo('Prekes');
	}

}
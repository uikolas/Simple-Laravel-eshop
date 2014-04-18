<?php

class Prekes extends Eloquent {

	protected $table = 'prekes';
	public $timestamps = false;

	public function kategorija() {
		return $this->belongsTo('Kategorijos');
	}
	
	// Validation rules
	public static $rules = array(
		'pavadinimas' 	=> 'required', 
		'slug' 			=> 'required',
		'aprasymas' 	=> 'required',
		'kaina' 		=> 'required',
		'kategorija' 	=> 'required',
		'kiekis' 		=> 'required',
	);
	
}
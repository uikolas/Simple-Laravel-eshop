<?php

class Item extends Eloquent {

	protected $table = 'prekes';
	public $timestamps = false;

	/**
	 * Relationship
	 * 
	 * @return array
	 */
	public function category() {
		return $this->belongsTo('Category', 'kategorija_id');
	}
	
	/**
	 * Validation rules
	 */
	public static $rules = array(
		'pavadinimas' 	=> 'required', 
		'slug' 			=> 'required',
		'aprasymas' 	=> 'required',
		'kaina' 		=> 'required',
		'kategorija' 	=> 'required',
		'kiekis' 		=> 'required',
	);
	
}
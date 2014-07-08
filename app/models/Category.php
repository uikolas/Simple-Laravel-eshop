<?php

class Category extends Eloquent {

	protected $table = 'kategorijos';
	public $timestamps = false;

	/**
	 * Relationship
	 * 
	 * @return array
	 */
	public function items(){
		return $this->hasMany('Item', 'kategorija_id');
	}

	/**
	 * Validation rules
	 */
	public static $rules = array(
		'pavadinimas' => 'required', 
		'slug' => 'required'
	);

}
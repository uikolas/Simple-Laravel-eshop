<?php

class Order extends Eloquent {

	protected $table = 'uzsakymai';
	public $timestamps = false;
	protected $fillable = array('vardas', 'pavarde', 'email', 'telefonas', 'miestas', 'adresas', 'atsiimti');
	
	// Validation rules
	public static $rules = array(
		'vardas' 	=> 'required|between:1,50|alpha', // alpha - tik raides leidziamos
		'pavarde' 	=> 'required|between:1,50|alpha',
		'email' 	=> 'required|between:1,50|email',
		'telefonas' => 'required|digits:9', // digits - tik skaiciai leidziami ir turi buti is 9 skaiciu
		'miestas' 	=> 'required|between:1,50|alpha',
		'adresas' 	=> 'required|between:1,50',
		'atsiimti' 	=> 'required',
	);	

}
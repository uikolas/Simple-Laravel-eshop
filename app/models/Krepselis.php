<?php

class Krepselis extends Eloquent {

	protected $table = 'krepselis';
	public $timestamps = false;
	
	public function preke() {
		return $this->belongsTo('Prekes');
	}	
	
	// Grazina nario krepselio informacija
	public static function krepselioInfo($id){
		$masyvas = array();
		$masyvas['kiekis'] = Krepselis::where('user_id', '=', $id)->count();
		$masyvas['suma'] = Krepselis::krepselioSuma($id);
		$masyvas['prekes'] = Krepselis::prekesKrepselyje($id);
		return $masyvas;
	}

	// Grazina krepselio suma prekiu visu
	public static function krepselioSuma($id){
		$suma = 0;
		$prekes = Krepselis::where('user_id', '=', $id)->get();
		foreach($prekes as $krepselis){
			$suma += $krepselis->preke->kaina;
		}
		return $suma;
	}	
	
	// Grazina prekes ID masyve
	public static function prekesKrepselyje($id) {
		$masyvas = array();
		$prekes = Krepselis::where('user_id', '=', $id)->get();
		foreach($prekes as $preke){
			$masyvas[] = $preke->preke_id;
		}
		return $masyvas;
	}	

}
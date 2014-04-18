<?php

class Krepselis extends Eloquent {

	protected $table = 'krepselis';
	public $timestamps = false;
	
	public function preke() {
		return $this->belongsTo('Prekes');
	}	
	
	// Grazina nario krepselio informacija
	// $id - Sesijos id
	public static function krepselioInfo($id){
		$masyvas = array();
		$masyvas['kiekis'] = count($id);
		$masyvas['suma'] = self::krepselioSuma($id);
		$masyvas['prekes'] = self::prekesKrepselyje($id);
		return $masyvas;
	}

	// Grazina krepselio suma prekiu visu
	// $id - Sesijos id
	public static function krepselioSuma($id){
		$suma = 0;
		if($id){
			foreach($id as $reiksme){
				$preke = Prekes::find($reiksme['preke']);
				$suma += $preke->kaina * $reiksme['kiekis'];
			}
		} 
		return $suma;
	}	
	
	// Grazina uzsisakusio zmogaus prekes ID masyve
	// $id - Sesijos id
	public static function prekesKrepselyje($id) {
		$masyvas = array();
		if($id){
			foreach($id as $reiksme){
				$masyvas[] = $reiksme['preke'];
			}
		}
		return $masyvas;
	}	
	
	// Grazina prekiu informacija pagal id
	// $id - Sesijos id
	public static function prekesUser($id){
		$masyvas = array();
		if($id){
			foreach($id as $reiksme){
				$preke = Prekes::find($reiksme['preke']);
				$masyvas[] = array(
					'id' => 			$preke->id, 
					'pavadinimas' => 	$preke->pavadinimas,
					'kaina' => 			$preke->kaina,
					'slug' => 			$preke->slug,
					'kiekis' =>			$reiksme['kiekis']
				);
			}
		}
		return $masyvas;
	}

}
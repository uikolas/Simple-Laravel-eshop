<?php

class KrepselisController extends BaseController {

	public function __construct(){
		parent::__construct();
	}

	public function getIndex(){
		$this->data['uzsakymas'] = Krepselis::where('user_id', '=', Session::get('user_id'))->get();
		return View::make('puslapiai.krepselis', $this->data);
	}
	
	// Prideti preke i krepseli
	public function getPridetiPreke($id){
		$response = 1;
		$kiekis = 0;
		$suma = 0;		
		if(in_array($id, $this->data['prekes_krepselyje'])) { // Ar pridejes i krepseli preke
			$response = 0; 
		} else {
			$krepselis = new Krepselis();
			$krepselis->user_id = Session::get('user_id');
			$krepselis->preke_id = $id;
			$krepselis->kiekis = 1;
			$krepselis->save();
			$kiekis = Krepselis::where('user_id', '=', Session::get('user_id'))->count();
			$suma = $this->krepselioSuma();
		}
		return Response::json(array(
			'response' => $response, 
			'kiekis' => $kiekis,
			'suma' => $suma
		));
	}
	
	// Istrynti preke i krepseli
	public function getIsmestiPreke($id){
		$preke = Krepselis::where('preke_id', '=', $id)->first();
		$preke->delete();
	}
	
}
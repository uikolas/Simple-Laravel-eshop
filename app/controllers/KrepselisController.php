<?php

class KrepselisController extends BaseController {

	public function __construct(){
		parent::__construct();
	}

	// Grazina krepseli
	public function getIndex(){
		View::Share('title', 'Krepšelis');
		$this->data['uzsakymas'] = Krepselis::prekesUser(Session::get('cart'));
		return View::make('puslapiai.krepselis', $this->data);
	}
	
	// Grazina ivedama kontaktine informacija
	public function getKontaktineInformacija(){
		View::Share('title', 'Krepšelis');
		return View::make('puslapiai.krepselis-kontaktai', $this->data);
	}
	
	public function postKontaktineInformacija(){
		View::Share('title', 'Krepšelis');
		$validator = Validator::make(Input::all(), array(
			'vardas' 	=> 'required|between:1,50|alpha', // alpha - tik raides leidziamos
			'pavarde' 	=> 'required|between:1,50|alpha',
			'email' 	=> 'required|between:1,50|email',
			'telefonas' => 'required|digits:9', // digits - tik skaiciai leidziami ir turi buti is 9 skaiciu
			'miestas' 	=> 'required|between:1,50|alpha',
			'adresas' 	=> 'required|between:1,50',
			'atsiimti' 	=> 'required',
		));
		if ($validator->fails()) {
			return Redirect::to('kontaktine-informacija')->withErrors($validator);
		} else {
			$uzsakymas = new Uzsakymai;
			$uzsakymas->uzsakymo_nr = Helper::randomNumber();
			$uzsakymas->vardas = Input::get('vardas');
			$uzsakymas->pavarde = Input::get('pavarde');
			$uzsakymas->email = Input::get('email');
			$uzsakymas->telefonas = Input::get('telefonas');
			$uzsakymas->miestas = Input::get('miestas');
			$uzsakymas->adresas = Input::get('adresas');
			$uzsakymas->atsiimti = Input::get('atsiimti');
			$uzsakymas->suma = Krepselis::krepselioSuma(Session::get('cart'));
			$uzsakymas->save();
			foreach(Session::get('cart') as $reiksme){
				$krepselis = new Krepselis;
				$krepselis->preke_id = $reiksme['preke'];
				$krepselis->kiekis = $reiksme['kiekis'];
				$krepselis->user_id = $uzsakymas->uzsakymo_nr;
				$krepselis->save();
			}
			Session::flush();
			Session::regenerate();			
			return Redirect::to('/patvirtinimas/'.$uzsakymas->uzsakymo_nr);
		}
	}	
	
	// Grazina patvirtinima ir apmokejimo langa
	// $id - uzsakymo numeris
	public function getPatvirtinimas($id){
		View::Share('title', 'Užsakymo apmokėjimas ir patvirtinimas');
		$this->data['uzsakymas'] = Uzsakymai::where('uzsakymo_nr', '=', $id)->firstOrFail();
		return View::make('puslapiai.krepselis-patvirtinimas', $this->data);
	}

	public function postPatvirtinimas($id){
		$uzsakymas = Uzsakymai::where('uzsakymo_nr', '=', $id)->firstOrFail();
		return Redirect::to('/uzsakymas/'.$uzsakymas->uzsakymo_nr);
	}	
	
	// Grazina zmogaus uzsisakusio kontaktus ir uzsakytas prekes
	// $id - uzsakymo numeris
	public function getUzsakymas($id){
		View::Share('title', 'Užsakymas');
		$this->data['uzsakymas'] = Uzsakymai::where('uzsakymo_nr', '=', $id)->firstOrFail();
		$this->data['krepselio_prekes'] = Krepselis::where('user_id', '=', $id)->get();
		return View::make('puslapiai.uzsakymas', $this->data);
	}
	
	// Prideti preke i krepseli
	// $id - Prekes id
	public function getPridetiPreke($id){
		$response = 1;
		$kiekis = 0;
		$suma = 0;		
		if(in_array($id, Krepselis::prekesKrepselyje(Session::get('cart')))) { 
			$response = 0; 
		} else {
			$masyvas = array('preke' => $id, 'kiekis' => 1);
			Session::push('cart', $masyvas);
			$suma = Krepselis::krepselioSuma(Session::get('cart'));
			$kiekis = count(Session::get('cart'));
		}
		return Response::json(array(
			'response' => $response, 
			'kiekis' => $kiekis,
			'suma' => $suma
		));
	}
	
	// Istrynti preke i krepseli
	// $id - Prekes id
	public function getIsmestiPreke($id){
		$masyvas = array();
		foreach(Session::get('cart') as $reiksme){
			if($reiksme['preke'] != $id){
				$masyvas[] = array('preke' => $reiksme['preke'], 'kiekis' => $reiksme['kiekis']);
			}
		}	
		if(count($masyvas) > 0){
			Session::flush();
			Session::regenerate();
			Session::put('cart', $masyvas);
		} else {
			Session::flush();
			Session::regenerate();		
		}		
	}
	
	// Atnaujina prekes kieki
	// $id - Prekes id
	// $kiekis - Prekes kiekis
	public function getAtnaujintiKieki($id, $kiekis){
		$masyvas = array();
		foreach(Session::get('cart') as $reiksme){
			if($reiksme['preke'] == $id){
				$masyvas[] = array('preke' => $reiksme['preke'], 'kiekis' => $kiekis);
			} else {
				$masyvas[] = array('preke' => $reiksme['preke'], 'kiekis' => $reiksme['kiekis']);
			}
		}
		Session::flush();
		Session::regenerate();
		Session::put('cart', $masyvas);		
	}
	
}
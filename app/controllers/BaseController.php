<?php

class BaseController extends Controller {

	protected $data = array();
	
	public function __construct(){
		Session::put('user_id', md5($_SERVER['REMOTE_ADDR']));
		$this->data['user_id'] = Session::get('user_id');				
		
		$this->data['krepselis'] = Krepselis::where('user_id', '=', Session::get('user_id'))->get(); // ar turi pridejes i krepseli
		$this->data['krepselis_kiekis'] = Krepselis::where('user_id', '=', Session::get('user_id'))->count(); // prekiu kiekis is krepselio
		$this->data['krepselis_suma'] = $this->krepselioSuma();
		$this->data['prekes_krepselyje'] = $this->prekesKrepselyje();
		$this->data['kategorijos'] = Kategorijos::all();
		
		$this->data['header'] = View::make('header', $this->data);
		$this->data['footer'] = View::make('footer', $this->data);
		$this->data['side'] = View::make('side', $this->data);
	}

	// Grazina krepselio suma prekiu visu
	protected function krepselioSuma(){
		$suma = 0;
		$prekes = Krepselis::where('user_id', '=', Session::get('user_id'))->get();
		foreach($prekes as $krepselis){
			$suma += $krepselis->preke->kaina;
		}
		return $suma;
	}	
	
	// Grazina prekes ID masyve
	private function prekesKrepselyje() {
		$masyvas = array();
		$prekes = Krepselis::where('user_id', '=', Session::get('user_id'))->get();
		foreach($prekes as $preke){
			$masyvas[] = $preke->preke_id;
		}
		return $masyvas;
	}

	public function getKontaktai(){
		return View::make('puslapiai.kontaktai', $this->data);
	}
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout(){
		if ( ! is_null($this->layout)){
			$this->layout = View::make($this->layout);
		}
	}

}
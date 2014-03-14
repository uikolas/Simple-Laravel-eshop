<?php

class PrekesController extends BaseController {

	public function __construct(){
		parent::__construct();
	}

	// Grazina visas prekes su puslapiavimu
	public function getIndex(){
		$this->data['prekes'] = Prekes::orderBy('id', 'DESC')->paginate(9);
		View::Share('title', 'Prekės');
		return View::make('puslapiai.pagrindinis', $this->data);
	}
	
	// Grazina viena preke
	public function getPreke($slug){
		$this->data['preke'] = Prekes::where('slug', '=', $slug)->firstOrFail();
		View::Share('title', $this->data['preke']['pavadinimas']);
		return View::make('puslapiai.preke', $this->data);
	}
	
	// Grazina prekes pagal kategorija
	public function getPrekesKategorija($slug){
		$kat = Kategorijos::where('slug', '=', $slug)->firstOrFail();
		$this->data['prekes'] = Prekes::where('kategorija_id', '=', $kat->id)->orderBy('id', 'DESC')->paginate(9);
		View::Share('title', $kat->pavadinimas);
		return View::make('puslapiai.pagrindinis', $this->data);
	}	

}
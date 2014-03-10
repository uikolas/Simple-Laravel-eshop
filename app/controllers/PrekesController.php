<?php

class PrekesController extends BaseController {

	public function __construct(){
		parent::__construct();
	}

	// Grazina visas prekes su puslapiavimu
	public function getIndex(){
		$this->data['prekes'] = Prekes::paginate(15);
		return View::make('puslapiai.pagrindinis', $this->data);
	}
	
	// Grazina viena preke
	public function getPreke($slug){
		$this->data['preke'] = Prekes::where('slug', '=', $slug)->firstOrFail();
		return View::make('puslapiai.preke', $this->data);
	}
	
	// Grazina prekes pagal kategorija
	public function getPrekesKategorija($slug){
		$cat = Kategorijos::where('slug', '=', $slug)->firstOrFail();
		$this->data['prekes'] = Prekes::where('kategorija_id', '=', $cat->id)->paginate(15);
		return View::make('puslapiai.pagrindinis', $this->data);
	}
	
}
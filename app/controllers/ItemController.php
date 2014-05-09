<?php

class ItemController extends BaseController {

	public function __construct(){
		parent::__construct();
	}

	// Grazina visas prekes su puslapiavimu
	public function getIndex(){
		$this->data['items'] = Item::orderBy('id', 'DESC')->paginate(9);
		View::Share('title', 'Prekės');
		return View::make('pages.items', $this->data);
	}
	
	// Grazina viena preke
	public function getItem($slug){
		$this->data['item'] = Item::where('slug', '=', $slug)->firstOrFail();
		View::Share('title', $this->data['item']['pavadinimas']);
		return View::make('pages.item', $this->data);
	}
	
	// Grazina prekes pagal kategorija
	public function getItemCategory($slug){
		$cat = Category::where('slug', '=', $slug)->firstOrFail();
		$this->data['items'] = Item::where('kategorija_id', '=', $cat->id)->orderBy('id', 'DESC')->paginate(9);
		View::Share('title', $cat->pavadinimas);
		return View::make('pages.items', $this->data);
	}	

}
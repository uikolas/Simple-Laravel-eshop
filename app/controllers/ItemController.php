<?php

class ItemController extends BaseController {

	public function __construct(){
		parent::__construct();
	}

	// Returns all items
	public function getIndex(){
		$items = Item::orderBy('id', 'DESC')->paginate(9);
		View::Share('title', 'Prekės');
		return View::make('pages.items')->with('items', $items);
	}
	
	// Returns one item
	// $slug - items identifier
	public function getItem($slug){
		$item = Item::where('slug', '=', $slug)->firstOrFail();
		View::Share('title', $item->pavadinimas);
		return View::make('pages.item')->with('item', $item);
	}
	
	// Returns items by category
	// $slug - cetegory identifier
	public function getItemCategory($slug){
		$category = Category::where('slug', '=', $slug)->firstOrFail();
		$items = Item::where('kategorija_id', '=', $category->id)->orderBy('id', 'DESC')->paginate(9);
		View::Share('title', $category->pavadinimas);
		return View::make('pages.items')->with('items', $items);
	}	

}
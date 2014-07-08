<?php

class ItemController extends BaseController {

	public function __construct(){
		parent::__construct();
	}

	/**
	 * Show all items
	 * 
	 * @return response
	 */
	public function getIndex(){
		$items = Item::with('category')->orderBy('id', 'DESC')->paginate(9);
		View::Share('title', 'Prekės');
		return View::make('pages.items')->with('items', $items);
	}
	
	/**
	 * Show one item
	 * 
	 * @param string $slug 
	 * @return response
	 */
	public function getItem($slug){
		$item = Item::with('category')->where('slug', '=', $slug)->firstOrFail();
		View::Share('title', $item->pavadinimas);
		return View::make('pages.item')->with('item', $item);
	}
	
	/**
	 * Show categorys
	 * 
	 * @param string $slug 
	 * @return response
	 */
	public function getItemCategory($slug){
		$category = Category::where('slug', '=', $slug)->firstOrFail();
		$items = Item::with('category')->where('kategorija_id', '=', $category->id)->orderBy('id', 'DESC')->paginate(9);
		View::Share('title', $category->pavadinimas);
		return View::make('pages.items')->with('items', $items);
	}	

}
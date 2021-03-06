<?php

namespace Admin;

use BaseController;
use View;
use Helper;
use Item, Category, Order;

class MainController extends BaseController {

	public function __construct(){
		parent::__construct();
	}

	/**
	 * Show admin index
	 * 
	 * @return response
	 */
	public function getIndex(){
		$items = Item::all()->count();
		$categories = Category::all()->count();
		$orders = Order::where('apmoketa', '=', '0')->count();
		return View::make('admin.main')
			->with('items', $items)
			->with('categories', $categories)
			->with('orders', $orders);
	}

	/**
	 * Make slug name
	 * 
	 * @param string $string 
	 * @return string
	 */
	public function getSlugName($string){
		return Helper::makeLink($string);
	}	

}
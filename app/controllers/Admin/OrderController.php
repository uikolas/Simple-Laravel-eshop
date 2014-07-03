<?php

namespace Admin;

use BaseController;
use View;
use Cart, Order;

class OrderController extends BaseController {

	// Returns order index
	public function index(){
		$orders = Order::orderBy('id', 'DESC')->paginate(9);
		return View::make('admin.orders.index')->with('orders', $orders);
	}

	// Returns users order with ordered items
	public function show($id){
		$order = Order::where('uzsakymo_nr', '=', $id)->firstOrFail();
		$order_items= Cart::where('user_id', '=', $id)->get();
		return View::make('admin.orders.show')->with('order', $order)->with('order_items', $order_items);
	}

}
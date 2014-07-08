<?php

namespace Admin;

use BaseController;
use View;
use Cart, Order;

class OrderController extends BaseController {

	/**
	 * Show orders
	 * 
	 * @return response
	 */
	public function index(){
		$orders = Order::orderBy('id', 'DESC')->paginate(9);
		return View::make('admin.orders.index')->with('orders', $orders);
	}

	/**
	 * Show order by id
	 * 
	 * @param integer $id 
	 * @return response
	 */
	public function show($id){
		$order = Order::where('uzsakymo_nr', '=', $id)->firstOrFail();
		$orderItems= Cart::where('user_id', '=', $id)->get();
		return View::make('admin.orders.show')->with('order', $order)->with('orderItems', $orderItems);
	}

}
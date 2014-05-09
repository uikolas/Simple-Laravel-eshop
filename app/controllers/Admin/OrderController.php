<?php

namespace Admin;

class OrderController extends \BaseController {

	public function index(){
		$this->data['orders'] = \Order::orderBy('id', 'DESC')->paginate(9);
		return \View::make('admin.orders.index', $this->data);
	}

	public function show($id){
		$this->data['order'] = \Order::where('uzsakymo_nr', '=', $id)->firstOrFail();
		$this->data['order_items'] = \Cart::where('user_id', '=', $id)->get();
		return \View::make('admin.orders.show', $this->data);
	}

}
<?php

class CartController extends BaseController {

	public function __construct(){
		parent::__construct();
	}

	// Returns cart
	public function getIndex(){
		$order = Cart::itemsUser(Session::get('cart'));
		View::Share('title', 'Krepšelis');
		return View::make('pages.cart')->with('order', $order);
	}
	
	// Returns contact information
	public function getContactInformation(){
		View::Share('title', 'Krepšelis');
		return View::make('pages.cart-contacts');
	}
	
	public function postContactInformation(){
		View::Share('title', 'Krepšelis');
		$validator = Validator::make(Input::all(), Order::$rules);
		if ($validator->fails()) {
			return Redirect::to('kontaktine-informacija')->withErrors($validator);
		} else {
			$order = new Order;
			$order->uzsakymo_nr = Helper::randomNumber();
			$order->fill(Input::all());
			$order->suma = Cart::cartTotal(Session::get('cart'));
			$order->save();
			foreach(Session::get('cart') as $value){
				$cart = new Cart;
				$cart->preke_id = $value['item'];
				$cart->kiekis = $value['amount'];
				$cart->user_id = $order->uzsakymo_nr;
				$cart->save();
			}
			Session::flush();
			Session::regenerate();			
			return Redirect::to('/patvirtinimas/'.$order->uzsakymo_nr);
		}
	}	
	
	// Returns confirm window
	// $id - order number
	public function getConfirm($id){
		$order = Order::where('uzsakymo_nr', '=', $id)->firstOrFail();
		View::Share('title', 'Užsakymo apmokėjimas ir patvirtinimas');
		return View::make('pages.cart-confirm')->with('order', $order);
	}

	public function postConfirm($id){
		$order = Order::where('uzsakymo_nr', '=', $id)->firstOrFail();
		return Redirect::to('/uzsakymas/'.$order->uzsakymo_nr);
	}	
	
	// Returns order window with items
	// $id - order number
	public function getOrder($id){
		$order = Order::where('uzsakymo_nr', '=', $id)->firstOrFail();
		$cart_items = Cart::where('user_id', '=', $id)->get();
		View::Share('title', 'Užsakymas');
		return View::make('pages.order')->with('order', $order)->with('cart_items', $cart_items);
	}
	
	// Add item to cart 
	// $id - item id
	public function getAddItem($id){
		$response = 1;
		$amount = $total = 0;
		if(in_array($id, Cart::cartItems(Session::get('cart')))) { 
			$response = 0; 
		} else {
			Session::push('cart', array('item' => $id, 'amount' => 1));
			$total = Cart::cartTotal(Session::get('cart'));
			$amount = count(Session::get('cart'));
		}
		return Response::json(array(
			'response' => $response, 
			'amount' => $amount,
			'total' => $total
		));
	}
	
	// Removes items from cart
	// $id - item id
	public function getRemoveItem($id){
		$cart_items = array();
		foreach(Session::get('cart') as $value){
			if($value['item'] != $id){
				$cart_items[] = array('item' => $value['item'], 'amount' => $value['amount']);
			}
		}	
		if(count($cart_items) > 0){
			Session::flush();
			Session::regenerate();
			Session::put('cart', $cart_items);
		} else {
			Session::flush();
			Session::regenerate();		
		}		
	}
	
	// Updates items count in cart
	// $id - item id
	// $amount - items amount
	public function getUpdateAmount($id, $amount){
		$cart_items = array();
		foreach(Session::get('cart') as $value){
			if($value['preke'] == $id){
				$cart_items[] = array('item' => $value['item'], 'amount' => $amount);
			} else {
				$cart_items[] = array('item' => $value['item'], 'kiekis' => $value['amount']);
			}
		}
		Session::flush();
		Session::regenerate();
		Session::put('cart', $cart_items);		
	}
	
}
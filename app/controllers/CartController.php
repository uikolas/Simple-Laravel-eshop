<?php

class CartController extends BaseController {

	public function __construct(){
		parent::__construct();
	}

	// Grazina krepseli
	public function getIndex(){
		View::Share('title', 'Krepšelis');
		$this->data['order'] = Cart::itemsUser(Session::get('cart'));
		return View::make('pages.cart', $this->data);
	}
	
	// Grazina ivedama kontaktine informacija
	public function getContactInformation(){
		View::Share('title', 'Krepšelis');
		return View::make('pages.cart-contacts', $this->data);
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
	
	// Grazina patvirtinima ir apmokejimo langa
	// $id - uzsakymo numeris
	public function getConfirm($id){
		View::Share('title', 'Užsakymo apmokėjimas ir patvirtinimas');
		$this->data['order'] = Order::where('uzsakymo_nr', '=', $id)->firstOrFail();
		return View::make('pages.cart-confirm', $this->data);
	}

	public function postConfirm($id){
		$order = Order::where('uzsakymo_nr', '=', $id)->firstOrFail();
		return Redirect::to('/uzsakymas/'.$order->uzsakymo_nr);
	}	
	
	// Grazina zmogaus uzsisakusio kontaktus ir uzsakytas prekes
	// $id - uzsakymo numeris
	public function getOrder($id){
		View::Share('title', 'Užsakymas');
		$this->data['order'] = Order::where('uzsakymo_nr', '=', $id)->firstOrFail();
		$this->data['cart_items'] = Cart::where('user_id', '=', $id)->get();
		return View::make('pages.order', $this->data);
	}
	
	// Prideda preke i krepseli
	// $id - Prekes id
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
	
	// Istrina preke is krepselio
	// $id - Prekes id
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
	
	// Atnaujina prekes kieki
	// $id - Prekes id
	// $kiekis - Prekes kiekis
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
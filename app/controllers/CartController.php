<?php

class CartController extends BaseController {

	public function __construct(){
		parent::__construct();
	}

	/**
	 * Show cart
	 * 
	 * @return response
	 */
	public function getIndex(){
		$order = Cart::itemsUser(Session::get('cart'));
		View::Share('title', 'Krepšelis');
		return View::make('pages.cart')->with('order', $order);
	}
	
	/**
	 * Show contact information
	 * 
	 * @return response
	 */
	public function getContactInformation(){
		View::Share('title', 'Krepšelis');
		return View::make('pages.cart-contacts');
	}
	
	/**
	 * Post contact information
	 * 
	 * @return redirect
	 */
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
	
	/**
	 * Show order window
	 * 
	 * @param integer $id 
	 * @return response
	 */
	public function getOrder($id){
		$order = Order::where('uzsakymo_nr', '=', $id)->firstOrFail();
		$cartItems = Cart::where('user_id', '=', $id)->get();
		View::Share('title', 'Užsakymas');
		return View::make('pages.order')->with('order', $order)->with('cartItems', $cartItems);
	}
	
	/**
	 * Add item to cart
	 * 
	 * @param integer $id 
	 * @return json
	 */
	public function addItem($id){
		$response = 1;
		$amount = $total = 0;
		$item = Item::find($id);
		if(in_array($id, Cart::cartItems(Session::get('cart'))) || !$item) { 
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
	
	/**
	 * Update amount of items in cart
	 * 
	 * @param integer $id 
	 * @param integer $amount 
	 * @return void
	 */
	public function updateAmount($id, $amount){
		$cartItems = array();
		$item = Item::find($id);
		if(in_array($id, Cart::cartItems(Session::get('cart'))) && $item) { 
			foreach(Session::get('cart') as $value){
				if($amount > 0 && $amount < 99){
					if($value['item'] == $id){
						$cartItems[] = array('item' => $value['item'], 'amount' => $amount);
					} else {
						$cartItems[] = array('item' => $value['item'], 'amount' => $value['amount']);
					}
				} else return Redirect::to('/');
			}
		} else return Redirect::to('/');
		Session::flush();
		Session::regenerate();
		Session::put('cart', $cartItems);		
	}
		
	/**
	 * Remove item from cart
	 * 
	 * @param integer $id 
	 * @return void
	 */
	public function removeItem($id){
		$cartItems = array();
		$item = Item::find($id);
		if(in_array($id, Cart::cartItems(Session::get('cart'))) && $item) { 
			foreach(Session::get('cart') as $value){
				if($value['item'] != $id){
					$cartItems[] = array('item' => $value['item'], 'amount' => $value['amount']);
				}
			}	
		} else return Redirect::to('/');
		Session::flush();
		Session::regenerate();
		if(count($cartItems) > 0){
			Session::put('cart', $cartItems);
		}	
	}
	
}
<?php

class Cart extends Eloquent {

	protected $table = 'krepselis';
	public $timestamps = false;
	
	public function item() {
		return $this->belongsTo('Item', 'id');
	}	
	
	// Grazina nario krepselio informacija
	// $id - Sesijos id
	public static function cartInfo($id){
		$cart = array();
		$cart['amount'] = count($id);
		$cart['total'] = self::cartTotal($id);
		$cart['items'] = self::cartItems($id);
		return $cart;
	}

	// Grazina krepselio suma prekiu visu
	// $id - Sesijos id
	public static function cartTotal($id){
		$total = 0;
		if(!empty($id)){
			foreach($id as $value){
				$item = Item::find($value['item']);
				$total += $item->kaina * $value['amount'];
			}
		} 
		return $total;
	}	
	
	// Grazina uzsisakusio zmogaus prekes ID masyve
	// $id - Sesijos id
	public static function cartItems($id) {
		$cart_items = array();
		if(!empty($id)){
			foreach($id as $value){
				$cart_items[] = $value['item'];
			}
		}
		return $cart_items;
	}	
	
	// Grazina prekiu informacija pagal id
	// $id - Sesijos id
	public static function itemsUser($id){
		$cart_items = array();
		if(!empty($id)){
			foreach($id as $value){
				$item = Item::find($value['item']);
				$cart_items[] = array(
					'id' => 			$item->id, 
					'name' => 			$item->pavadinimas,
					'price' => 			$item->kaina,
					'slug' => 			$item->slug,
					'amount' =>			$value['amount']
				);
			}
		}
		return $cart_items;
	}

}
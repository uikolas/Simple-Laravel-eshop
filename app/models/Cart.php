<?php

class Cart extends Eloquent {

	protected $table = 'krepselis';
	public $timestamps = false;
	
	/**
	 * Relantionship
	 * 
	 * @return array
	 */
	public function item() {
		return $this->belongsTo('Item', 'preke_id');
	}	
	
	/**
	 * Show cart info
	 * 
	 * @param integer $id 
	 * @return array
	 */
	public static function cartInfo($id){
		$cart = array();
		$cart['amount'] = count($id);
		$cart['total'] = self::cartTotal($id);
		$cart['items'] = self::cartItems($id);
		return $cart;
	}

	/**
	 * Return cart amount of items
	 * 
	 * @param integer $id 
	 * @return integer
	 */
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
	
	/**
	 * Return user items
	 * 
	 * @param integer $id 
	 * @return array
	 */
	public static function cartItems($id) {
		$cartItems = array();
		if(!empty($id)){
			foreach($id as $value){
				$cartItems[] = $value['item'];
			}
		}
		return $cartItems;
	}	
	
	/**
	 * Return item info
	 * 
	 * @param integer $id 
	 * @return array
	 */
	public static function itemsUser($id){
		$cartItems = array();
		if(!empty($id)){
			foreach($id as $value){
				$item = Item::find($value['item']);
				$cartItems[] = array(
					'id' => 			$item->id, 
					'name' => 			$item->pavadinimas,
					'price' => 			$item->kaina,
					'slug' => 			$item->slug,
					'amount' =>			$value['amount']
				);
			}
		}
		return $cartItems;
	}

}
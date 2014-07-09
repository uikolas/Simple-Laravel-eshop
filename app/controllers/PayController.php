<?php

class PayController extends BaseController {

	private $projectid = '';
	private $signPassword = '';

	public function __construct(){
		parent::__construct();
	}

	/**
	 * Show confirm window
	 * 
	 * @param integer $id 
	 * @return response
	 */
	public function getConfirm($id){
		$order = Order::where('uzsakymo_nr', '=', $id)->firstOrFail();
		$request = WebToPay::buildRequest(array(
			'projectid'     => $this->projectid,
			'sign_password' => $this->signPassword,
			'orderid'       => $order->uzsakymo_nr,
			'amount'        => $order->suma * 100,
			'p_email'		=> $order->email,
			'p_firstname'	=> $order->vardas,
			'p_lastname'	=> $order->pavarde,
			'currency'      => 'LTL',
			'country'       => 'LT',
			'accepturl'     => url().'/accept',
			'cancelurl'     => url().'/cancel',
			'callbackurl'   => url().'/callback',
			'test'          => 1,
		));
		View::Share('title', 'Užsakymo apmokėjimas ir patvirtinimas');
		return View::make('pages.cart-confirm')->with('order', $order)->with('request', $request);
	}

	/**
	 * Process payment
	 * 
	 * @return void
	 */
	public function getCallback(){
		try {
			$response = WebToPay::checkResponse($_GET, array(
				'projectid'     => $this->projectid,
				'sign_password' => $this->signPassword,
			));
		 
			if ($response['test'] !== '0') {
				throw new Exception('Testing, real payment was not made');
			}
			if ($response['type'] !== 'macro') {
				throw new Exception('Only macro payment callbacks are accepted');
			}
			
			echo 'OK';
		} catch (Exception $e) {
			Log::error(get_class($e) . ': ' . $e->getMessage());
		} 	
	}
	
	/**
	 * Show accept window
	 * 
	 * @return request
	 */
	public function getAccept(){
		View::Share('title', 'Apmokėta');
		return View::make('pages.accept');
	}
	
	/**
	 * Show cancel window
	 * 
	 * @return request
	 */
	public function getCancel(){
		View::Share('title', 'Atšaukta');
		return View::make('pages.cancel');
	}

}
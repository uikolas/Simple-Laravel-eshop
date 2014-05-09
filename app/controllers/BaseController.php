<?php

class BaseController extends Controller {

	protected $data = array();
	
	public function __construct(){
		$this->beforeFilter('csrf', array('on' => array('post', 'delete', 'put')));
		$this->beforeFilter('ajax', array('on' => array('post', 'delete', 'put')));	
		View::Share('cart', Cart::cartInfo(Session::get('cart')));
		View::Share('categories', Category::all());
		View::Share('title', '');
	}

	public function getContacts(){
		View::Share('title', 'Kontaktai');
		return View::make('pages.contact');
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout(){
		if (!is_null($this->layout)){
			$this->layout = View::make($this->layout);
		}
	}
}
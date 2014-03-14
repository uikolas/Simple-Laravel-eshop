<?php

class BaseController extends Controller {

	protected $data = array();
	
	public function __construct(){
		$this->beforeFilter('csrf', array('on' => array('post', 'delete', 'put')));
		$this->beforeFilter('ajax', array('on' => array('post', 'delete', 'put')));	
		Session::put('user_id', md5($_SERVER['REMOTE_ADDR']));
		View::Share('krepselis', Krepselis::krepselioInfo(Session::get('user_id')));
		View::Share('kategorijos', Kategorijos::all());
		View::Share('title', '');
	}

	public function getKontaktai(){
		View::Share('title', 'Kontaktai');
		return View::make('puslapiai.kontaktai');
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
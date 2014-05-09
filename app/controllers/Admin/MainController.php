<?php

namespace Admin;

class MainController extends \BaseController {

	public function __construct(){
		parent::__construct();
	}

	public function getIndex(){
		$this->data['items'] = \Item::all()->count();
		$this->data['categories'] = \Category::all()->count();
		$this->data['orders'] = \Order::where('apmoketa', '=', '0')->count();
		return \View::make('admin.main', $this->data);
	}

	public function getSlugName($string){
		return \Helper::makeLink($string);
	}	

}
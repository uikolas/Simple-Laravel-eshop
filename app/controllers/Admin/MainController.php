<?php

namespace Admin;

//use Illuminate\Support\Facades\View;

class MainController extends \BaseController {

	public function __construct(){
		parent::__construct();
	}

	public function getIndex(){
		$this->data['prekes'] = \Prekes::all()->count();
		$this->data['kategorijos'] = \Kategorijos::all()->count();
		$this->data['uzsakymai'] = \Uzsakymai::where('apmoketa', '=', '0')->count();
		return \View::make('admin.main', $this->data);
	}

	public function getSlugName($string){
		return \Helper::makeLink($string);
	}	

}
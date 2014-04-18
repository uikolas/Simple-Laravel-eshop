<?php

namespace Admin;

class UzsakymaiController extends \BaseController {

	public function index(){
		$this->data['uzsakymai'] = \Uzsakymai::orderBy('id', 'DESC')->paginate(9);
		return \View::make('admin.uzsakymai.index', $this->data);
	}

	public function show($id){
		$this->data['uzsakymas'] = \Uzsakymai::where('uzsakymo_nr', '=', $id)->firstOrFail();
		$this->data['krepselio_prekes'] = \Krepselis::where('user_id', '=', $id)->get();
		return \View::make('admin.uzsakymai.show', $this->data);
	}

}
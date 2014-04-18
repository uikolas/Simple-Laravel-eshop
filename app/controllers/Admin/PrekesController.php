<?php

namespace Admin;

class PrekesController extends \BaseController {

	public function index(){
		$this->data['prekes'] = \Prekes::orderBy('id', 'DESC')->paginate(9);
		return \View::make('admin.prekes.index', $this->data);
	}

	public function create(){
		$this->data['kategorijos'] = \Kategorijos::all();
		return \View::make('admin.prekes.create', $this->data);
	}

	public function store(){
		$validator = \Validator::make(\Input::all(), \Prekes::$rules);
		if ($validator->fails()) {
			return \Redirect::to('admin/prekes/create')->withErrors($validator);
		} else {
			//$preke = new \Prekes;
			\Session::flash('message', 'Sėkmingai sukurta!');
			return \Redirect::to('/admin/prekes');
		}		
	}

	public function edit($id){
		$this->data['preke'] = \Prekes::find($id);
		return \View::make('admin.prekes.edit', $this->data);
	}

	public function update($id){
		$validator = \Validator::make(\Input::all(), \Prekes::$rules);
		if ($validator->fails()) {
			return \Redirect::to('admin/prekes/'.$id.'/edit')->withErrors($validator);
		} else {
			//$preke = \Prekes::find($id);
			\Session::flash('message', 'Sėkmingai redaguota!');
			return \Redirect::to('/admin/prekes');
		}	
	}

	public function destroy($id){
		//$preke = \Prekes::find($id);
		\Session::flash('message', 'Sėkmingai Išstrinta!');
		return \Redirect::to('/admin/prekes');
	}

}
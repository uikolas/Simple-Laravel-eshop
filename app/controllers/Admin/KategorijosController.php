<?php

namespace Admin;

class KategorijosController extends \BaseController {

	public function index(){
		$this->data['kategorijos'] = \Kategorijos::all();
		return \View::make('admin.kategorijos.index', $this->data);
	}

	public function create(){
		return \View::make('admin.kategorijos.create');
	}

	public function store(){
		$validator = \Validator::make(\Input::all(), array('pavadinimas' => 'required', 'slug' => 'required'));
		if ($validator->fails()) {
			return \Redirect::to('admin/kategorijos/create')->withErrors($validator);
		} else {
			//$kategorija = new \Kategorijos;
			\Session::flash('message', 'Sėkmingai sukurta!');
			return \Redirect::to('/admin/kategorijos');
		}		
	}

	public function edit($id){
		$this->data['kategorija'] = \Kategorijos::find($id);
		return \View::make('admin.kategorijos.edit', $this->data);
	}

	public function update($id){
		$validator = \Validator::make(\Input::all(), array('pavadinimas' => 'required', 'slug' => 'required'));
		if ($validator->fails()) {
			return \Redirect::to('admin/kategorijos/'.$id.'/edit')->withErrors($validator);
		} else {
			//$kategorija = \Kategorijos::find($id);
			\Session::flash('message', 'Sėkmingai redaguota!');
			return \Redirect::to('/admin/kategorijos');
		}	
	}

	public function destroy($id){
		//$kategorija = \Kategorijos::find($id);
		\Session::flash('message', 'Sėkmingai Išstrinta!');
		return \Redirect::to('/admin/kategorijos');
	}

}
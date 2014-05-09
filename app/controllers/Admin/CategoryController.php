<?php

namespace Admin;

class CategoryController extends \BaseController {

	public function index(){
		$this->data['categories'] = \Category::all();
		return \View::make('admin.categories.index', $this->data);
	}

	public function create(){
		return \View::make('admin.categories.create');
	}

	public function store(){
		$validator = \Validator::make(\Input::all(), array('pavadinimas' => 'required', 'slug' => 'required'));
		if ($validator->fails()) {
			return \Redirect::to('admin/kategorijos/create')->withErrors($validator);
		} else {
			\Session::flash('message', 'Sėkmingai sukurta!');
			return \Redirect::to('/admin/kategorijos');
		}		
	}

	public function edit($id){
		$this->data['category'] = \Category::find($id);
		return \View::make('admin.categories.edit', $this->data);
	}

	public function update($id){
		$validator = \Validator::make(\Input::all(), array('pavadinimas' => 'required', 'slug' => 'required'));
		if ($validator->fails()) {
			return \Redirect::to('admin/kategorijos/'.$id.'/edit')->withErrors($validator);
		} else {
			\Session::flash('message', 'Sėkmingai redaguota!');
			return \Redirect::to('/admin/kategorijos');
		}	
	}

	public function destroy($id){
		\Session::flash('message', 'Sėkmingai Išstrinta!');
		return \Redirect::to('/admin/kategorijos');
	}

}
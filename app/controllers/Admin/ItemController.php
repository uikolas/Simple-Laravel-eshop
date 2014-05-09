<?php

namespace Admin;

class ItemController extends \BaseController {

	public function index(){
		$this->data['items'] = \Item::orderBy('id', 'DESC')->paginate(9);
		return \View::make('admin.items.index', $this->data);
	}

	public function create(){
		$this->data['categories'] = \Category::all();
		return \View::make('admin.items.create', $this->data);
	}

	public function store(){
		$validator = \Validator::make(\Input::all(), \Item::$rules);
		if ($validator->fails()) {
			return \Redirect::to('admin/prekes/create')->withErrors($validator);
		} else {
			\Session::flash('message', 'Sėkmingai sukurta!');
			return \Redirect::to('/admin/prekes');
		}		
	}

	public function edit($id){
		$this->data['item'] = \Item::find($id);
		return \View::make('admin.items.edit', $this->data);
	}

	public function update($id){
		$validator = \Validator::make(\Input::all(), \Item::$rules);
		if ($validator->fails()) {
			return \Redirect::to('admin/prekes/'.$id.'/edit')->withErrors($validator);
		} else {
			\Session::flash('message', 'Sėkmingai redaguota!');
			return \Redirect::to('/admin/prekes');
		}	
	}

	public function destroy($id){
		\Session::flash('message', 'Sėkmingai Išstrinta!');
		return \Redirect::to('/admin/prekes');
	}

}
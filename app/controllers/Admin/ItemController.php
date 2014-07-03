<?php

namespace Admin;

use BaseController;
use View, Validator, Input, Redirect, Session;
use Helper;
use Item, Category, Order;

class ItemController extends BaseController {

	public function index(){
		$items = Item::orderBy('id', 'DESC')->paginate(9);
		return View::make('admin.items.index')->with('items', $items);
	}

	public function create(){
		$categories = Category::all();
		return View::make('admin.items.create')->with('categories', $categories);
	}

	public function store(){
		$validator = Validator::make(Input::all(), Item::$rules);
		if ($validator->fails()) {
			return Redirect::to('admin/prekes/create')->withErrors($validator);
		} else {
			Session::flash('message', 'Sėkmingai sukurta!');
			return Redirect::to('/admin/prekes');
		}		
	}

	public function edit($id){
		$item = Item::find($id);
		return View::make('admin.items.edit')->with('item', $item);
	}

	public function update($id){
		$validator = Validator::make(Input::all(), Item::$rules);
		if ($validator->fails()) {
			return Redirect::to('admin/prekes/'.$id.'/edit')->withErrors($validator);
		} else {
			Session::flash('message', 'Sėkmingai redaguota!');
			return Redirect::to('/admin/prekes');
		}	
	}

	public function destroy($id){
		Session::flash('message', 'Sėkmingai Išstrinta!');
		return Redirect::to('/admin/prekes');
	}

}
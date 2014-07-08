<?php

namespace Admin;

use BaseController;
use View, Validator, Input, Redirect, Session;
use Helper;
use Item, Category, Order;

class ItemController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * 
	 * @return response
	 */
	public function index(){
		$items = Item::orderBy('id', 'DESC')->paginate(9);
		return View::make('admin.items.index')->with('items', $items);
	}

	/**
	 * Show the form for creating a new resource.
	 * 
	 * @return response
	 */
	public function create(){
		$categories = Category::all();
		return View::make('admin.items.create')->with('categories', $categories);
	}

	/**
	 * Store a newly created resource in storage.
	 * 
	 * @return response
	 */
	public function store(){
		$validator = Validator::make(Input::all(), Item::$rules);
		if ($validator->fails()) {
			return Redirect::to('admin/prekes/create')->withErrors($validator);
		} else {
			Session::flash('message', 'Sėkmingai sukurta!');
			return Redirect::to('/admin/prekes');
		}		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  integer  $id
	 * @return response
	 */
	public function edit($id){
		$item = Item::find($id);
		return View::make('admin.items.edit')->with('item', $item);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  integer  $id
	 * @return response
	 */
	public function update($id){
		$validator = Validator::make(Input::all(), Item::$rules);
		if ($validator->fails()) {
			return Redirect::to('admin/prekes/'.$id.'/edit')->withErrors($validator);
		} else {
			Session::flash('message', 'Sėkmingai redaguota!');
			return Redirect::to('/admin/prekes');
		}	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  integer  $id
	 * @return response
	 */
	public function destroy($id){
		Session::flash('message', 'Sėkmingai Išstrinta!');
		return Redirect::to('/admin/prekes');
	}

}
<?php

namespace Admin;

use BaseController;
use View, Validator, Input, Redirect, Session;
use Helper;
use Item, Category, Order;

class CategoryController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return response
	 */
	public function index(){
		$categories = Category::all();
		return View::make('admin.categories.index')->with('categories', $categories);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return response
	 */
	public function create(){
		return View::make('admin.categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return response
	 */
	public function store(){
		$validator = Validator::make(Input::all(), Category::$rules);
		if ($validator->fails()) {
			return Redirect::to('admin/kategorijos/create')->withErrors($validator);
		} else {
			Session::flash('message', 'Sėkmingai sukurta!');
			return Redirect::to('/admin/kategorijos');
		}		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  integer  $id
	 * @return response
	 */
	public function edit($id){
		$category = Category::find($id);
		return View::make('admin.categories.edit')->with('category', $category);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  integer  $id
	 * @return response
	 */
	public function update($id){
		$validator = Validator::make(Input::all(), Category::$rules);
		if ($validator->fails()) {
			return Redirect::to('admin/kategorijos/'.$id.'/edit')->withErrors($validator);
		} else {
			Session::flash('message', 'Sėkmingai redaguota!');
			return Redirect::to('/admin/kategorijos');
		}	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  integer  $id
	 * @return response
	 */
	public function destroy($id){
		Session::flash('message', 'Sėkmingai Išstrintegera!');
		return Redirect::to('/admin/kategorijos');
	}

}
<?php

namespace Admin;

use BaseController;
use View, Validator, Input, Redirect, Session;
use Helper;
use Item, Category, Order;

class CategoryController extends BaseController {

	public function index(){
		$categories = Category::all();
		return View::make('admin.categories.index')->with('categories', $categories);
	}

	public function create(){
		return View::make('admin.categories.create');
	}

	public function store(){
		$validator = Validator::make(Input::all(), Category::$rules);
		if ($validator->fails()) {
			return Redirect::to('admin/kategorijos/create')->withErrors($validator);
		} else {
			Session::flash('message', 'Sėkmingai sukurta!');
			return Redirect::to('/admin/kategorijos');
		}		
	}

	public function edit($id){
		$category = Category::find($id);
		return View::make('admin.categories.edit')->with('category', $category);
	}

	public function update($id){
		$validator = Validator::make(Input::all(), Category::$rules);
		if ($validator->fails()) {
			return Redirect::to('admin/kategorijos/'.$id.'/edit')->withErrors($validator);
		} else {
			Session::flash('message', 'Sėkmingai redaguota!');
			return Redirect::to('/admin/kategorijos');
		}	
	}

	public function destroy($id){
		Session::flash('message', 'Sėkmingai Išstrinta!');
		return Redirect::to('/admin/kategorijos');
	}

}
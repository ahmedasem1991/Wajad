<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test23', function(){
	// $users= User::all()->random(3);
	// return $users[0]->id;
	 return \App\Category::all()->pluck('name_en','id');
});

Route::get('{slug}/{param?}', '\Remipou\NovaPageManager\PageController@page')
	->where('slug', '^((?!' . trim(config('nova.path'), '/') . '|nova-).)*$')
	->name('page-manager');


Auth::routes();

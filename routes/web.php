<?php
use App\Settings;
use Illuminate\Support\Str;
use App\Region;

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

// Route::get('/test', function(){
// 	return Settings::find('about-us');
// });

Route::resource('user', 'UserController');
Route::resource('item', 'ItemController');
Route::resource('category', 'CategoryController');
Route::resource('itemimages', 'ItemImagesController');
Route::resource('questions', 'QuestionsController');
Route::resource('answers', 'AnswersController');
Route::resource('itemrequests', 'ItemRequestsController');
Route::resource('products', 'ProductsController');
Route::resource('cards', 'CardsController');
Auth::routes();

Route::get('/test', function(){
	$nexmo = app('Nexmo\Client');
	$nexmo->message()->send([
		'to'   => '201142416124',
		'from' => 'nexmo',
		'text' => 'Using the facade to send a message.'
	]);
	 
	
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('{slug}/{param?}', '\Remipou\NovaPageManager\PageController@page')
	->where('slug', '^((?!' . trim(config('nova.path'), '/') . '|nova-).)*$')
	->name('page-manager');

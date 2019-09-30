<?php
use App\Item;
use App\User;
use App\Region;
use App\Package;
use App\Settings;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

Route::resource('user', 'UserController');
Route::resource('item', 'ItemController');
Route::resource('category', 'CategoryController');
Route::resource('itemimages', 'ItemImagesController');
Route::resource('questions', 'QuestionsController');
Route::resource('answers', 'AnswersController');
Route::resource('itemrequests', 'ItemRequestsController');
Route::resource('products', 'ProductsController');
Route::resource('cards', 'CardsController');

/*
Route::get('{slug}/{param?}', '\Remipou\NovaPageManager\PageController@page')
	->where('slug', '^((?!' . trim(config('nova.path'), '/') . '|nova-).)*$')
	->name('page-manager');
*/

Auth::routes();

Route::get('/test500', function(){
	// return htmlspecialchars(Item::where('id', 100)->first());
	// $nexmo = app('Nexmo\Client');
	// $nexmo->message()->send([
	// 	'to'   => '201095781611',
	// 	'from' => 'nexmo',
	// 	'text' => 'Using the facade to send a message.'
	// ]);
	//getimagesize('');

	//return Package::packagesPeriod();
	for ($x = 1; $x <= 20; $x++) {
	\QrCode::size(1000000)
			  ->format('png')
			  ->merge('https://himsworthscott.com/content/uploads/2019/05/Apple-Logo-Png-Download-768x950.png', 0.3, true)
			  ->generate('ItSolutionStuff.com', public_path('images/qrcodes/'.time().'.png'));
	}
	$now = Carbon\Carbon::now();
       return 'N-'.$now->year.$now->month.$now->day;
	   ;
});
 

Route::get('/home', 'HomeController@index')->name('home');
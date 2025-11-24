<?php

use App\Item;
use App\Package;

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

/*
Route::get('{slug}/{param?}', '\Remipou\NovaPageManager\PageController@page')
    ->where('slug', '^((?!' . trim(config('nova.path'), '/') . '|nova-).)*$')
    ->name('page-manager');
*/

Auth::routes();
Route::get('/', function () {
    return 'welcome';
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', function () {
    // return htmlspecialchars(Item::where('id', 100)->first());
    // $nexmo = app('Nexmo\Client');
    // $nexmo->message()->send([
    // 	'to'   => '201095781611',
    // 	'from' => 'nexmo',
    // 	'text' => 'Using the facade to send a message.'
    // ]);
    // getimagesize('');

    return Package::packagesPeriod();
});

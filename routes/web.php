<?php

 
use App\Post;
 

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

Route::get('/test23', function () {
    // $users= User::all()->random(3);
    // return $users[0]->id;
    return \App\Category::all()->pluck('name_en', 'id');
});

 

Auth::routes();
//Test Notification
Route::get('/sendfcm', 'NotificationController@sendFCM');
Route::get('/sendsms', 'NotificationController@sendSMS');
//Paypal
Route::get('paypal','PaymentController@payWithpaypal');
Route::get('status','PaymentController@getPaymentStatus');

Route::get('/test600', function(){
 
});

Route::get('/test500', function(){
     return auth()->user()->corporate; 
    return url('/wajad');
   $url= Request::path();
    return($url);
    $Post=Post::find(1);
  return  $Post->reports;

})->name('test500');;

route::get('/bridge', function () {
    Log::info('test 2');
    return view('welcome');
});

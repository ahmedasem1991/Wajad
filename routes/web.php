<?php


use App\Post;
use App\Exceptions\Api\ApiException;
use App\Exceptions\Api\VerifyActivationCodeException;
use App\Exceptions\Api\VerifyActivationCodeException2;


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
    throw new ApiException(trans('auth.failed'));


})->name('test500');;

route::get('/bridge', function () {
    Log::info('test 2');
    return view('welcome');
});


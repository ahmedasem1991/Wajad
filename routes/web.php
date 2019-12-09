<?php


use App\Post;
use App\Exceptions\Api\ApiException;
use App\Exceptions\Api\VerifyActivationCodeException;
use App\Exceptions\Api\VerifyActivationCodeException2;

use App\User;
use App\Qrcode;
use App\Corporate;
use Laravel\Nova\Nova;
use App\Events\TestEvent;
use Illuminate\Support\Facades\App;
use App\Notifications\TestNotification;
use App\Notifications\BroadcastNotification;

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

// \Mpociot\ApiDoc\ApiDoc::routes("/apidoc");

Route::get('/test23', function () {
  // $users= User::all()->random(3);
  // return $users[0]->id;
  return \App\Category::all()->pluck('name_en', 'id');
});


Route::get('/home', function () {

  return  redirect(Nova::path());
});

Auth::routes();
//Test Notification
// Route::get('/sendfcm', 'NotificationController@sendFCM');
Route::get('/sendsms', 'NotificationController@sendSMS');
//Paypal
Route::get('paypal', 'PaymentController@payWithpaypal');
Route::get('status', 'PaymentController@getPaymentStatus');

Route::get('/test600', function () { });


route::get('/', function () {

  return view('welcome');
});


Route::get('test', function () {
  logger(event(new App\Events\StatusLiked('Someone')));
  return "Event has been sent!";
});




Route::get('/bridge', function () {
  $pusher = App::make('pusher');

  $pusher->trigger(
    'test-channel',
    'test-event',
    array('text' => 'Preparing the Pusher Laracon.eu workshop!')
  );

  return view('welcome');
});

Route::get('/broadcast', function () {

  // Pusher::trigger('test-channel', 'TestEvent', [
  //     'text' => 'Preparing the Pusher Laracon.eu workshop!'
  //     ]);
  // event(new TestEvent('Broadcasting in Laravel using Pusher! Broadcasting in Laravel using Pusher!'));

  return view('home');
});
Route::get('/test500', function () {

  $Corporate = Corporate::find(1);

  return $Corporate->users->where('type', 2);
})->name('test500');


Route::get('/test400', function () {
  $user = User::find(20);

  $user->notify(new BroadcastNotification('error', 'test message', 'facebook.com'));
  return view('welcome');
})->name('test400');

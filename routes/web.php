<?php

use App\Item;
use App\Post;
use App\User;
use App\Region;
use App\Package;
use App\Settings;
use Laravel\Nova\Nova;

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

use App\PostLimitation;
use App\Events\TestEvent;
use Illuminate\Support\Str;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\App;

// Route::get('{slug}/{param?}', '\Remipou\NovaPageManager\PageController@page')
//     ->where('slug', '^((?!' . trim(config('nova.path'), '/') . '|nova-).)*$')
//     ->name('page-manager');


Auth::routes();

Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');

Route::get('paypal','PaymentController@payWithpaypal');
Route::get('status','PaymentController@getPaymentStatus');
Route::get('/test600', function(){
    return view('welcome');
});
Route::get('/test500', function(){
     return redirect(Nova::path().'/resources/packages'); 
    return url('/wajad');
   $url= Request::path();
    return($url);
    $Post=Post::find(1);
  return  $Post->reports;
//     if(count($user->posts) >= $user->postLimitation->posts_limitation)
//    { return 'true';}
//     else{
//       return $user->postLimitation->posts_limitation;
//     }
    // if(Auth()->User()->isAdmin())
	// {
	// 	return 'yes';
	// }
	// else{
	// 	return 'no';
	// }
	// return htmlspecialchars(Item::where('id', 100)->first());
	// $nexmo = app('Nexmo\Client');
	// $nexmo->message()->send([
	// 	'to'   => '201095781611',
	// 	'from' => 'nexmo',
	// 	'text' => 'Using the facade to send a message.'
	// ]);
	//getimagesize('');

    //return Package::packagesPeriod();
    // for ($x = 1; $x <= 20; $x++) {
    // \QrCode::size(1000000)
    // 		  ->format('png')
    // 		  ->merge('https://himsworthscott.com/content/uploads/2019/05/Apple-Logo-Png-Download-768x950.png', 0.3, true)
    // 		  ->generate('ItSolutionStuff.com', public_path('images/qrcodes/'.time().'.png'));
    // }
    // $now = Carbon\Carbon::now();
    //    return Auth()->user();
    //    ;

    return  'nexmo';
})->name('test500');;

route::get('/bridge', function () {
    Log::info('test 2');
    return view('welcome');
});


Auth::routes();

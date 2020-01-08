<?php

use App\ApiToken;
use App\Post;
use App\User;
use App\Qrcode;
use App\Corporate;

use Carbon\Carbon;
use App\PostRequest;
use Laravel\Nova\Nova;
use Barryvdh\DomPDF\PDF;
use phpseclib\Crypt\RSA;
use App\Events\TestEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Exceptions\Api\ApiException;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Storage;
use App\Notifications\BroadcastNotification;
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

\Mpociot\ApiDoc\ApiDoc::routes("/apidoc");


Route::get('/rsa-signature', function () {
    $rsa = new RSA();

    $privateKey = file_get_contents(storage_path('app/keys/privateKey.pem'));

    $rsa->loadKey($privateKey);

    $plaintext = 'test';

    $signature = $rsa->sign($plaintext);

    echo base64_encode($signature);

    die;

    $publicKey = file_get_contents(public_path('keys/publicKey.pem'));

    $rsa->loadKey($publicKey);

    echo $rsa->verify($plaintext, $signature) ? 'verified' : 'unverified';
});


Route::post('validrsa', function (Request $request) {
    if (ApiToken::whereToken($request->rsa)->first()) {
        return 'unverified';
    }

    $rsa = new RSA;

    $publicKey = file_get_contents(public_path('keys/publicKey.pem'));

    $rsa->loadKey($publicKey);

    $rsa->verify('test', base64_decode($request->rsa)) ? 'verified' : 'unverified';

    ApiToken::create([
        'token' => $request->rsa
    ]);
})->name('validrsa');

Route::view('testrsa', 'testrsa');


Route::get('rsa-encrypt', function () {
    $rsa = new RSA();

    $publicKey = file_get_contents(public_path('keys/publicKey.pem'));

    $rsa->loadKey($publicKey);

    $plaintext = env("APP_KEY");

    $ciphertext = base64_encode($rsa->encrypt($plaintext));

    $privateKey = file_get_contents(storage_path('app/keys/privateKey.pem'));

    $rsa->loadKey($privateKey);

    echo $rsa->decrypt(base64_decode($ciphertext)) == $plaintext ? 'verified' : 'unverified';
});

Route::get('/home', function () {

    return  redirect(Nova::path());
});

Route::view('qrcode', 'Pdf.qrcode');
Auth::routes();
//Test Notification
Route::get('/sendfcm', 'NotificationController@sendFCM');
Route::get('/sendsms', 'NotificationController@sendSMS');
//Paypal
Route::get('paypal', 'PaymentController@payWithpaypal');
//PDF
Route::get('receipt', 'PDFController@receipt');
Route::get('qrcodepdf', 'PDFController@qrcodepdf');
Route::get('assignqrcodepdf', 'PDFController@assignqrcodepdf');
Route::get('status', 'PaymentController@getPaymentStatus');

Route::get('/test600', function () {
//     $array=[];
//     foreach(Auth()->User()->roles as $role)
//     {
//         foreach($role->permissions as $permission)
//         {
//         $array[$permission]= $permission;
//         }
//     }
//    return $array;
});


route::get('/', function () {

  return redirect(Nova::path());
});


Route::get('test', function () {
  return now()->toDatetimeString();
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
    return  defaultGroup()->posts_period;
//  dd( $user->roles());
//  foreach()

//  if($user->permissions()) {
//   return 'true';
// }
// else{
//  return 'false';
// }


//   $pdf = PDF::loadView('Pdf.receipt', $data=[]);
//  return $pdf->stream('receipt.pdf');

})->name('test500');


Route::get('/test400', function () {
    $user = User::find(20);

    $user->notify(new BroadcastNotification('error', 'test message', 'facebook.com'));
    return view('welcome');
})->name('test400');

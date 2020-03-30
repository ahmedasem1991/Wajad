<?php

use App\Post;
use App\User;
use App\Qrcode;
use App\ApiToken;
use App\Corporate;

use Carbon\Carbon;
use App\PostRequest;
use App\SubCategory;
use Laravel\Nova\Nova;
use Barryvdh\DomPDF\PDF;
use phpseclib\Crypt\RSA;
use App\Events\TestEvent;
use App\Events\SendFCMEvent;
use Illuminate\Http\Request;
use App\Mail\EmailVerificationCode;
use Illuminate\Support\Facades\App;
use App\Exceptions\Api\ApiException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Storage;
use App\Notifications\BroadcastNotification;
//use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Notifications\ScanQRCodeNotification;
use App\Services\Filters\QRCodeFilters\Expired;
use App\Services\Filters\QRCodeFilters\MultiAssign;
use App\Services\Filters\QRCodeFilters\SingleAssign;
use App\Exceptions\Api\VerifyActivationCodeException;
use App\Exceptions\Api\VerifyActivationCodeException2;
use App\Services\Checkers\QrCodeCheckers\IsMultiAssign;
use App\Services\Checkers\QrCodeCheckers\IsSingleAssign;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

\Mpociot\ApiDoc\ApiDoc::routes("/apidoc");

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
    $im = new Imagick("https://pngimg.com/uploads/qr_code/qr_code_PNG6.png");
    $height = $im->getImageHeight();
    $width = $im->getImageWidth();
    $im->resizeImage($width * 2, $height * 2, Imagick::FILTER_POINT, 0);
    $im->medianFilterImage(8);

    header("Content-Type: image/png");
    echo $im;

    //   $sub= SubCategory::with('brands')->first();
    // return $sub->brands;
    // return str_replace(' ', '', '+996 45 464 6466');
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

Route::domain(config('nova.domain', null))
    ->prefix(Nova::path())
    ->group(function () {
        Route::post('/updatePassword', 'UpdatePasswordController@updatePassword')->name('update_password');
    });
route::get('/', function () {

    return redirect(Nova::path());
});


//Route::get('filters', function () {
//    $qrcode = Qrcode::withFilters(
//        new MultiAssign
//        // new Expired,
//    )->first();
//
//    dd(
//        $qrcode->checkFor(
//            new IsMultiAssign,
//            new IsSingleAssign,
//        )
//    );
//});

Route::get('test', function () {
    //return now()->toDatetimeString();
    /*
        $ImageName= time().str_random(20).'.png';
    $Url=time().str_random(20);
    $pngImage= \QrCode::format('png')
    ->merge(public_path('/images/'.env('QRCODE_LOGO','wajad_logo.png')), 0.2, true)
   ->color(93 ,188 ,210)
   ->size(2000)
    ->generate(env('API_URL').'/api/scan-qr-code/'.$Url,
    public_path('images/qrcodes/'.$ImageName));
  return '<img height=300px" width="300px" src=images/qrcodes/'.$ImageName.'>';

  */

    $client = new \GuzzleHttp\Client();
    $url = "https://qrcode3.p.rapidapi.com/generateQR?text=wajad.com&gradient_stop_color=%235DBCD2&fill_style=radialGradient&inner_eye_style=Diamond&inner_eye_color=%235DBCD2&outer_eye_color=%234F4F50&image=http://admin.smartappco.net/images/models/H3JQHCZXT775K3ItbrWr7Kfq1zhDpmfmSiSwJyDJ.png&outer_eye_style=Diamond&remove_background=false&format=png&size=500";


    $array = [];
    $x = 0;

    $form_params['text'] = 'wajad.com';
    $form_params['gradient_stop_color'] = '#5DBCD2';
    $form_params['fill_style'] = 'radialGradient';
    $form_params['inner_eye_style'] = "Diamond";
    $form_params['style'] = "";
    $form_params['style_color'] = "";
    $form_params['inner_eye_color'] = "#5DBCD2";
    $form_params['outer_eye_color'] = "#4F4F50";
    $form_params['image'] = "http://admin.smartappco.net/images/models/H3JQHCZXT775K3ItbrWr7Kfq1zhDpmfmSiSwJyDJ.png";
    $form_params['outer_eye_style'] = "Diamond";
    $form_params['bg_color'] = "";
    $form_params['remove_background'] = "false";
    $form_params['format'] = "png";
    $form_params['size'] = "400";




    $request = $client->get($url, [
        'headers' => [
            'Content-Type' => 'qrcode-monkey.p.rapidapi.com',
            'X-RapidAPI-Key' => 'b9f31e753dmsha87e82bfd8b0f36p14c4b2jsn8e9e036bc6e9'

        ],
        // 'multipart' => [
        //   [
        //       'x'     => '0',
        //       'y'     => '0',
        //       'data' => 'https%3A%2F%2Fqrcode.studio',
        //       'size' => '400',

        //   ]],
        array('form_params' =>  $form_params)
    ]);



    // echo  json_decode( $request->getBody());
    return   $request;
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
    $data=[
        'notification' => [
        'title'=>'Item updated successfully',
        'body'=>'Item updated successfully',
        'sound' => 'default'
        ]];
    $token=User::find(2)->device_token;
    event(new SendFCMEvent($token,$data));
  //  return  defaultGroup()->posts_period;
// $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
// $tr->setSource('ar'); // Translate from English
// $tr->setSource(); // Detect language automatically
// $tr->setTarget('en'); // Translate to Georgian
// echo $tr->translate('ابراهيم علي أية عبدالحميد تركي  محمد!');
//echo GoogleTranslate::trans('ahmed ali alii','en');
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
    $user = User::find(3);
    Mail::to($user)->send(new EmailVerificationCode('1234'));

    // $user->notify(new ScanQRCodeNotification('30.5458554','20.2545544'));
})->name('test400');

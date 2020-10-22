<?php

use App\Item;
use App\Post;
use App\Role;
use App\User;
use App\Qrcode;

use App\Setting;
use App\ApiToken;
use App\Corporate;
use Carbon\Carbon;
use App\PostRequest;
use App\SubCategory;
use Laravel\Nova\Nova;
use App\Mail\ScanQRCode;
use Barryvdh\DomPDF\PDF;
use phpseclib\Crypt\RSA;
use App\Events\TestEvent;
use Damas\Paytabs\Paytabs;
use App\Events\SendFCMEvent;
use Illuminate\Http\Request;
use App\Services\FCM\Facades\FCM;
use App\Mail\EmailVerificationCode;
use Illuminate\Support\Facades\App;
//use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Exceptions\Api\ApiException;
use App\Http\Resources\ItemResource;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Services\FCM\Sender\FCMSender;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SendFCMNotification;
use App\Notifications\BroadcastNotification;
use App\Services\FCM\Message\OptionsBuilder;
use App\Notifications\ScanQRCodeNotification;
use App\Services\Filters\QRCodeFilters\Expired;
use App\Services\FCM\Message\PayloadDataBuilder;
use App\Services\Filters\QRCodeFilters\MultiAssign;
use App\Services\Filters\QRCodeFilters\SingleAssign;
use App\Exceptions\Api\VerifyActivationCodeException;
use App\Exceptions\Api\VerifyActivationCodeException2;
use App\Services\Checkers\QrCodeCheckers\IsMultiAssign;
use App\Services\Checkers\QrCodeCheckers\IsSingleAssign;
use App\Services\FCM\Message\PayloadNotificationBuilder;

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
Route::get('paywithpaypal', function () {
   return  redirect(Nova::path());
});
//paytabs
Route::get('paytabs', 'PaymentController@payWithpaytabs');
Route::post('paytabschecker', 'PaymentController@checkPayWithPaytabs')->name('paytabschecker');
//PDF
Route::get('receipt', 'PDFController@receipt');
Route::get('ar_receipt', 'PDFController@arReceipt');
Route::get('qrcodepdf', 'PDFController@qrcodepdf');
Route::get('assignqrcodepdf', 'PDFController@assignqrcodepdf');
Route::get('status', 'PaymentController@getPaymentStatus');
Route::get('/smart-search', function (Request $request) {
    //sleep(5);
    $array=[];
    $user=  User::where('email',request('search'))->orWhere('mobile_number',request('search'))->first()  ; 

    if( $user)
    { 
      $array[0]['value']= $user->id;
      $array[0]['label']= request('search') .'('.$user->name .')' ;
      session()->put('smart_user_id',$user->id);
      return  json_encode( $array);
    }
   else
   return 0;
  });
 

Route::get('/test600', function (Request $request) {
    sleep(5);
    $array=[];
    
   // w@gaasmail.com
   $ii=  User::where('email',request('search'))->orWhere('mobile_number',request('search'))->first()  ; 
   //return $ii;
//    $array[0]['value']= 0;
//    $array[0]['label']= 'Select';
if( $ii)
  { $array[0]['value']= $ii->id;
   $array[0]['label']= request('search') .' ('.$ii->name .')' ;
   
   return  json_encode( $array);}
   else
   return 0;


   $C= Corporate::find(1);

    dd( $C->users->CorporateAdmin());
   // return Setting::where('key', 'max-post-reports-number')->first()['value'];
  return (trim('"["1","2","3"]"', '"'))  ;
   dd(User::find(["1","2","3"]));

    foreach(User::find(2)->devices as $device)
    {
      //  dd($device);
 array_push($array,$device->token);
    }
    return $array;
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


    $data='{
            "id": "6b328e8f-b787-4c9b-a09c-8933bbd370dd",
            "data": [
                {
                    "ar": {
                        "title": "  هناك شخص  قرأ رمز التعريف  الخاص بك ",
                       "body": "هناك شخص  قرأ رمز التعريف  الخاص بك   يمكنك اللإطلاع علي الخريطة . "
                   },
                   "en": {
                       "title": "  There Some One Scanned Your QR Code ",
                      "body": "There Some One Scanned Your QR Code    Check the location on the map . "
                  },
                   "url": "https://www.google.com/maps/search/?api=1&query=30.254445588,40.3644552",
                   "type": "qrcode",
                  "object_type": "scan",
                  "post": "scan",
                  "item": "scan",

                   "id": 10295,
                   "related_id": -1,
                  "badge": 1
              }
            ],
            "created_at": "2020-04-07T15:07:22.000000Z",
            "read_at": "2020-04-07T15:07:22.000000Z"
         }';
        $data=json_decode($data);

         $info='';
         $lang='ar';
         if($lang=='ar')
         $info=$data->data[0]->ar;
         else
         $info=$data->data[0]->en;

        // dd($data->data[0]->en);

    $data=[
        'notification' => [
        'title'=>'Item updated successfully',
        'body'=>'Item updated successfully',
        'sound' => 'default'
        ]
    ];

$optionBuilder = new OptionsBuilder();
$optionBuilder->setTimeToLive(60*20);

$notificationBuilder = new PayloadNotificationBuilder('Test title');
$notificationBuilder->setBody('Item Added Successfully')
				    ->setSound('default');

$dataBuilder = new PayloadDataBuilder();
$dataBuilder->addData(['data' => $data]);

$option = $optionBuilder->build();
$notification = $notificationBuilder->build();
$data = $dataBuilder->build();




$tokens=['czgeKTSNd74:APA91bG8Tz7SXv234psaHYD6JHrEO_Edb7QGn8nuXp2gB3kzsND_nI8n3RxowFBDDV0WqVNUelfZh8DoUSNwG0gnm_k6shiO7Z2OsQNldFtBmiFuKPRvBM9e1PQeU1alYoVQeCzyq65P','ff85vPGFJjY:APA91bHgolcEsr5tfhnX5vZuXIgRUBOfTrQtlukQHdqH9PiRcK8G31Ajdp3tufvhp1hEA47kHoKwPUCBtRqpX1jmS20cdjzO30Lueog7osD0qhpworB2ega9SWXjE5u6gPsT5__k_-L3','fgdn3qimz6w:APA91bGbOgHFs7nrNy9rkSRbG9xqstQ3l2dmKwjkVazd4DMsPtXvyu-Q_CgslCA_e2vpt9ytKOfpvSduw2E2Y1a4XaagT_Zspo_b5vqkSh7c1raKs0QF9fXtTS6v8YNTgWBTkPGvYCEy','cXlljBlySyo:APA91bFGSSYloVx-basj6rnrsP3ftdrZY31TEum0Zox1E3HjQTfgVRnFpVog5eykTZNrIk_0K9bnz7h36vG4whRqxHCkbGnkr6jcpLJvdXajtwjQlersFznol8yI9hO0qG0h19YC1Ljy','eymAGmV3Z6c:APA91bHlTyIhmKuWn5MJqBSosEL0NuqoCOK7yLEySGHpWWP5SAAhbAqapqRNl10-Wuo_Ah60GTmprhZ5oIkaCzbVf54TJDAuudkrgskDCHRVNlgwJEKQTZ-MG3s1C__z74YtlNOLjqjM','exeZR7So7k0:APA91bEaGnDoaPqkyZaMwEr3b_iEBZROYwOTF8iLG-CDIzVC17wXlDZNRPmFHX3gHlDHM5AeYYLf3ErDoGkCrpQudkgvFC8C3KSiMPRQ-OIpW3QtCGeK2G5q4ep46me5rllJiQnn7UwR','dkvoIVDtk5w:APA91bEhMGtlTkIQgDbtBr8QGT1uHow9prZpaw83Oag2v0TBbGbvgaX1NRzwijufXoBG__iCI97IuSb6_2-ZlmWVhCFmtwpRyEAUnNHcMxbVv-GjZbzskzWpyN8bsTR4GwVLMLWbjw6C'];
//$sender=new FCMSender();
$downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

$downstreamResponse->numberSuccess();
$downstreamResponse->numberFailure();
$downstreamResponse->numberModification();
dd($downstreamResponse);
// // return Array - you must remove all this tokens in your database
// $downstreamResponse->tokensToDelete();

// // return Array (key : oldToken, value : new token - you must change the token in your database)
// $downstreamResponse->tokensToModify();

// // return Array - you should try to resend the message to the tokens in the array
// $downstreamResponse->tokensToRetry();

// // return Array (key:token, value:error) - in production you should remove from your database the tokens
// $downstreamResponse->tokensWithError();
// dd ($downstreamResponse);
//     // $data=[
//     //     'notification' => [
//     //     'title'=>'Item updated successfully',
//     //     'body'=>'Item updated successfully',
//     //     'sound' => 'default'
//     //     ]];
//     // //$token=User::find(2)->device_token;
//     // event(new SendFCMEvent('cd83KWVdS0ykS4teOY-TVP:APA91bGq0qDp-TGrI5iqIeuzERwtGLTY4fndVVqp6fsIaENvm_iwUlJ3YyTGeAvM5tF7HGZsEKTooSzsl2vHjWVhAbHJD56k1r7fxYW-2C6CB5NrM7oYPEP6Aa-mhzOWnfI-ooeC6rtk',$data));
//   //  return  defaultGroup()->posts_period;
// // $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
// // $tr->setSource('ar'); // Translate from English
// // $tr->setSource(); // Detect language automatically
// // $tr->setTarget('en'); // Translate to Georgian
// // echo $tr->translate('ابراهيم علي أية عبدالحميد تركي  محمد!');
// //echo GoogleTranslate::trans('ahmed ali alii','en');
//     //  dd( $user->roles());
//     //  foreach()

//     //  if($user->permissions()) {
//     //   return 'true';
//     // }
//     // else{
//     //  return 'false';
//     // }


//     //   $pdf = PDF::loadView('Pdf.receipt', $data=[]);
//     //  return $pdf->stream('receipt.pdf');

})->name('test500');


Route::get('/test400', function () {
    // $post=Post::find(11);
    // $post->questions()->delete();
    // dd($post->questions);
//     $item = Item::find(1);
//    return  new ItemResource($item);
   //return  new PostResource($post);

    // if ($post->isFound())
    //   return  $type='post_found';
    //   else
    //   return  $type='post_lost';
// return   checklocate(auth('api')->user);
  //dd (Unifonic::send('966505770041', 'Test uinfonic by Ibrahem Saber','eTabeb'));

    $user = User::find(9);
    $item = Item::find(1);
    $post=Post::find(70);
    $badge =getBadge($user);
    $data=sendCreatePostFCM($post,$badge,'found');
    $user->notify(new SendFCMNotification($user,$data));


    })->name('test400');

    Route::get('/chat', function(){
        return view('scan-qr-code');
    });



    Route::get('/quicksession', function () {


    $url = "https://api.quickblox.com/session.json";
    $Now=\Carbon\Carbon::now()->timestamp;
    $Data= 'application_id='.env('QUICKBLOX_APPLICATION_ID').'&auth_key='.env('QUICKBLOX_AUTH_KEY').'&nonce=&timestamp='.$Now;
    $Hash= hash_hmac('SHA1', $Data, env('QUICKBLOX_AUTH_SECRET'));

       $form_params['application_id'] = env('QUICKBLOX_APPLICATION_ID');
       $form_params['auth_key'] =env('QUICKBLOX_AUTH_KEY');
       $form_params['timestamp'] = $Now;
       $form_params['nonce'] = "";
       $form_params['signature'] = $Hash;

       $data = json_encode($form_params);

  $client = new \GuzzleHttp\Client([
      'headers' => ['Content-Type' => 'application/json']
  ]);
  $response = $client->post($url,
          ['body' => $data]
  );
  $response = json_decode($response->getBody(), true);

  $token=$response['session']['token'];
  session(['token' => $token]);
   return( $token);

  });


  Route::get('/quickgetusers', function () {
    //dd(session('token'));

      $url = "https://api.quickblox.com/users.json";
      $client = new \GuzzleHttp\Client([
        'headers' => [
            'Content-Type' => 'application/json',
            'QB-Token' => session('token'),

            ]
    ]);
$response = $client->get($url
);
$response = json_decode($response->getBody(), true);

 return( $response);
  });

  Route::get('/quickcreateuser', function () {

    $Users=User::Normalusers()->whereNull('quick_user_id')->get();
    foreach($Users as $User)
    {

        $token='831ccf48d9341dff2ffeba0d5249971021014e1a';
        $url = "https://api.quickblox.com/users.json";

        $form_params['login'] = $User->email;
        $form_params['password'] = $User->quick_user_password;
        $form_params['email'] = $User->email;
        $form_params['external_user_id'] =$User->id;
        $form_params['facebook_id'] = "";
        $form_params['full_name'] =  $User->name;
        $form_params['phone'] =$User->country ? $User->country->country_code .$User->mobile_number: '' .$User->mobile_number;
        $form_params['website'] = '';
        $form_params['tag_list'] = '';
        $form_params['custom_data'] = '';

        $user['user'] = $form_params;

        $data = json_encode($user);

        $client = new \GuzzleHttp\Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'QB-Token' => $token,

            ]
        ]);
        $response = $client->post(
            $url,
            ['body' => $data]
        );
        $response = json_decode($response->getBody(), true);

         if($response['user']['id']);
      {
          $User->quick_user_id= $response['user']['id'];
          $User->save();
          logger($User->quick_user_id);
      }
    }





});





  Route::get('/quicklogin', function () {


    $url = "https://api.quickblox.com/login.json";
    $Now=\Carbon\Carbon::now()->timestamp;
    $Data= 'application_id='.env('QUICKBLOX_APPLICATION_ID').'&auth_key='.env('QUICKBLOX_AUTH_KEY').'&nonce=&timestamp='.$Now;
    $Hash= hash_hmac('SHA1', $Data, env('QUICKBLOX_AUTH_SECRET'));

       $form_params['application_id'] = env('QUICKBLOX_APPLICATION_ID');
       $form_params['auth_key'] =env('QUICKBLOX_AUTH_KEY');
       $form_params['timestamp'] = $Now;
       $form_params['nonce'] = "";
       $form_params['signature'] = $Hash;

       $data = json_encode($form_params);

  $client = new \GuzzleHttp\Client([
      'headers' => [
          'Content-Type' => 'application/json',
          'QB-Token' => session('token'),

          ]
  ]);
  $response = $client->post($url,
          ['body' => $data]
  );
  $response = json_decode($response->getBody(), true);


   return( $response);

  });


  Route::get('/test800', function(){
   $Data= 'application_id='.env('QUICKBLOX_APPLICATION_ID').'&auth_key='.env('QUICKBLOX_AUTH_KEY').'&nonce=&timestamp='.\Carbon\Carbon::now()->timestamp;
    echo hash_hmac('SHA1', $Data, env('QUICKBLOX_AUTH_SECRET'));
});
Route::get('/apple-app-site-association', function () {
    $json = file_get_contents(base_path('apple-app-site-association'));
    return response($json, 200)
        ->header('Content-Type', 'application/json');
});



Route::get('/paytabs_payment', function () {
    $email='i.saber@smartappco.com';
    $secret='809n8W8nSId5fWYxWFHHynkeeucgzfpHfy4ovdLoVYtbUsJR8qzGNUU2o7jYmIFChK0NXLbTKF5F8Oxge6X20S5p0onn730pN0dL';
    $pt = Paytabs::getInstance( $email, $secret);
	$result = $pt->create_pay_page(array(
        "merchant_email" => $email,
        'secret_key' => $secret,
        'title' => "John Doe",
        'cc_first_name' => "John",
        'cc_last_name' => "Doe",
        'email' => "customer@email.com",
        'cc_phone_number' => "973",
        'phone_number' => "33333333",
        'billing_address' => "Juffair, Manama, Bahrain",
        'city' => "Manama",
        'state' => "Capital",
        'postal_code' => "97300",
        'country' => "BHR",
        'address_shipping' => "Juffair, Manama, Bahrain",
        'city_shipping' => "Manama",
        'state_shipping' => "Capital",
        'postal_code_shipping' => "97300",
        'country_shipping' => "BHR",
        "products_per_title"=> "Mobile Phone",
        'currency' => "BHD",
        "unit_price"=> "1",
        'quantity' => "1",
        'other_charges' => "0",
        'amount' => "1.00",
        'discount'=>"0",
        "msg_lang" => "english",
        "reference_no" => "1231231",
        "site_url" => "https://www.smartappco.com/",
        'return_url' => "https://www.etabeb.com",
        "cms_with_version" => "API USING PHP"
	));
    
    	if($result->response_code == 4012){
           // dd($result);
	    return redirect($result->payment_url);
        }
        dd($result);
        //return $result->result;
});


Route::get('/paytabs_response', function(){

   // dd('ok');
    $email='i.saber@smartappco.com';
    $secret='809n8W8nSId5fWYxWFHHynkeeucgzfpHfy4ovdLoVYtbUsJR8qzGNUU2o7jYmIFChK0NXLbTKF5F8Oxge6X20S5p0onn730pN0dL';

    $pt = Paytabs::getInstance($email, $secret);
    $result = $pt->verify_payment('496284');
    if($result->response_code == 100){
        dd('No');
    }
    dd( $result);
    return $result->result;
});





Route::get('/test-qrcodes', function(){

 

    
    $url = "https://rapidapi.p.rapidapi.com/qr/custom";
     
    $Data= '{
        "data": "https://atcorp.sa",
        "config": {
            "body": "circle-zebra-vertical",
            "eye": "frame13",
            "eyeBall": "ball15",
            "erf1": [],
            "erf2": [],
            "erf3": [],
            "brf1": [],
            "brf2": [],
            "brf3": [],
            "bodyColor": "#0277BD",
            "bgColor": "#FFFFFF",
            "eye1Color": "#075685",
            "eye2Color": "#075685",
            "eye3Color": "#075685",
            "eyeBall1Color": "#0277BD",
            "eyeBall2Color": "#0277BD",
            "eyeBall3Color": "#0277BD",
            "gradientColor1": "#075685",
            "gradientColor2": "#0277BD",
            "gradientType": "linear",
            "gradientOnEyes": false,
            "logo": "#facebook"
        },
        "size": 600,
        "download": true,
        "file": "png"
    }';
     

       $data = json_encode($Data);

  $client = new \GuzzleHttp\Client([
      'headers' => [
        'content-type' => 'application/json',
        'x-rapidapi-host' => 'qrcode-monkey.p.rapidapi.com',
        'x-rapidapi-key' => 'a234aa0e2bmsh691d9755ff431d4p1d4528jsnde5abe068474'
      ]
  ]);
  $response = $client->post($url,
          ['body' => $data]
  );
  $response = json_decode($response->getBody(), true);

return $response;
    
    //$request = new http\Client\Request;
    
    //$body = new http\Message\Body;
     
 
    
  
 });
 
 Route::get('/test-free-qrcodes', function(){

    $ImageName= time().Str::random(20).'.png';
   $q= \QrCode::
    //gradient(10,20,30,40,50,60,'radial')
  eye('square')
  ->color(0,0, 0)
//   ->eyeColor(0, 0,0, 0, 6,120, 160) 
//   ->eyeColor( 1,0,0, 0, 6,120, 160)  
//   ->eyeColor( 2,0,0, 0, 6,120, 160) 
    ->style('dot',0.5)
    
    ->format('png')
    ->merge(public_path('/images/wajad1.png'), 0.2, true)
    ->size(2000)
    ->generate(env('API_URL').'/api/scan-qr-code/'.$ImageName,
    public_path('images/qrcodes2/'.$ImageName))
   ;
   
   return '<br> <br> <center><img src="'.env('API_URL').'/images/qrcodes2/'.$ImageName.'" height="600" width="600"></center>';
 });


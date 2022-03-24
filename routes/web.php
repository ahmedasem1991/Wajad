<?php

use App\Item;
use App\Post;
use App\Role;
use App\User;
use App\Brand;
// use Throwable;
use App\Qrcode;
use App\Setting;
use App\ApiToken;
use App\AssignQrcode;
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
use App\Jobs\DeleteUserChat;
use Illuminate\Http\Request;
use App\Services\FCM\Facades\FCM;
//use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Mail\EmailVerificationCode;
use Illuminate\Support\Facades\App;
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
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Services\Filters\QRCodeFilters\Expired;
use App\Services\FCM\Message\PayloadDataBuilder;
use App\Services\Filters\QRCodeFilters\MultiAssign;
use App\Services\Filters\QRCodeFilters\SingleAssign;
use App\Exceptions\Api\VerifyActivationCodeException;
use App\Exceptions\Api\VerifyActivationCodeException2;
use App\Services\Checkers\QrCodeCheckers\IsMultiAssign;
use App\Mail\AdminNotification as MailAdminNotification;
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

Route::get('mesibo_add', function () {
    $url = "https://api.mesibo.com/api.php?op=useradd&token=kyiy639elg9i7g4r4wes6swhknerfgzhr1enoorf1zwc67eitl1wj5kkg3vnop2j&addr=ahmed-test5785555&appid=com.smartappco.wajad&name=ahmed";
    $client = new \GuzzleHttp\Client([
       'headers' => ['Content-Type' => 'application/json']
    ]);
   
    $response = $client->get($url);
    dd(  json_decode($response->getBody(), true));
    ;
    foreach( User::normalusers()->get() as $user)
    {

        $url = "https://api.mesibo.com/api.php?op=useradd&token=".env('MESIBO_APP_TOKEN')."&addr=".$user->name.'-'.$user->id."&appid=com.smartappco.wajad&name=".$user->name;
        $client = new \GuzzleHttp\Client([
           'headers' => ['Content-Type' => 'application/json']
        ]);
       
        $response = $client->get($url);
        dd( $response);
        $response = json_decode($response->getBody(), true);
        $user->mesibo_uid= $response['user']['uid']??null;
        $user->mesibo_token= $response['user']['token']??null;
        $user->mesibo_address= $user->name.'-'.$user->id;
        $user->save();
    }

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
Route::get('qrcodezip', 'PDFController@qrcodeZIP');
Route::get('assignqrcodepdf', 'PDFController@assignqrcodepdf');
Route::get('status', 'PaymentController@getPaymentStatus');
// Route::get('/smart-search/{search}', function ($search) {
//     //sleep(5);
//     $array=[];
//     $user=  User::normalusers()
//     ->where('email',$search)
//     ->orWhere('mobile_number',$search)->first()  ;

//     if( $user)
//     {
//       $array[1]['value']= $user->id;
//       $array[1]['display']= request('search') .'('.$user->name .')' ;
//       session()->put('smart_user_id',$user->id);
//       return  json_encode( $array);
//     }
//    else
//    {
//        return 0;
//    }
//   });



Route::get('/smart-search/{search}', function ($search) {
    if(strlen($search) >= 4)
    {
        $search=$search;;
        $search = ltrim($search, '+966');
        $search = ltrim($search, '966');
        $search = ltrim($search, '0');
        $array=[];
        $users=  User::normalusers()
            ->where('email' ,'LIKE', '%'.$search.'%')
            ->orWhere('mobile_number','LIKE', '%'.$search.'%')
            ->orWhere('name','LIKE', '%'.$search.'%')->get()  ;

        foreach($users as $key => $user){
            if( $user)
            {
                $array[$key]['value']= $user->id;
                $array[$key]['display']= $user->mobile_number .'('.$user->name .')' ;
            }

        }
        return  json_encode( $array);
    }
});

Route::get('/test600', function (Request $request) {
 $string='01142416124';
$string2=   ltrim((string) $string, 0);
return $string2;
    $brands=Brand::take(700)->skip(600)->get();
     
    
    foreach($brands as $brand)
    {
        //  try {
        //     if (!preg_match('/[^A-Za-z0-9]/', $brand->name_en)) // '/[^a-z\d]/i' should also work.
        //     {
              
        //       // string contains only english letters & digits
            
        //     $tr = new GoogleTranslate();
        //     $tr->setSource('en');
        //     $tr->setTarget('ar');
        //     if($tra=$tr->translate('welcome')){
        //         dd( $tra);
        //         $brand->name_ar= $tra;
        //         $brand->save();
        //     }
        // }
          
        // } catch (Throwable $e) {
        //    dd( $e);
    
           
        // }

       
    }
    return 'ok';
   

    // $Now = \Carbon\Carbon::now()->timestamp;
    // $Data = 'application_id=' . env('QUICKBLOX_APPLICATION_ID') . '&auth_key=' . env('QUICKBLOX_AUTH_KEY') . '&nonce=&timestamp=' . $Now;
    // $Hash = hash_hmac('SHA1', $Data, env('QUICKBLOX_AUTH_SECRET'));


    // $form_params['signature'] = $Hash;

    $url = "https://api.mesibo.com/api.php?op=useradd&token=kyiy639elg9i7g4r4wes6swhknerfgzhr1enoorf1zwc67eitl1wj5kkg3vnop2j&addr=12&appid=wajad&expiry&active";
    $client = new \GuzzleHttp\Client([
        'headers' => ['Content-Type' => 'application/json']
    ]);
    $response = $client->get($url);
    $response = json_decode($response->getBody(), true);
    dd( $response['user']['uid']);

    return 'success';

    Mail::to(User::find(6))->send(new MailAdminNotification('test'));
    return view('emails.admin_notification')->with('body','test test test test ewdw wfw');
    dd(\Unifonic::send('966504334115', 'test message'))   ;
    Mail::to($user)->send(new MailAdminNotification('test'));
    $URL = URL::current();
    dd(request()->all());

    $str=$value;;
    $str = ltrim($str, '+966');
    $str = ltrim($str, '966');
    $str = ltrim($str, '0');
    return  $str;



    return  User::normalusers()->get()->toArray();
    // ->filter(function ($user) {
    //     return User::normalusers() $user->name . "-".$user->mobile_number;
    // })->pluck('name','id')->toArray();
    dd( Qrcode::type('Single Assign')->where('status','1')->count());
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



Route::get('/qrcode-print-pdf', function (Request $request) {
    $AssignQrcode=  AssignQrcode::find(base64_decode($request->get('p')));

    
    return view('Pdf.qrcodeweb')->with('assignQrcode',$AssignQrcode);
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
Route::get('/qr_test', function (Request $request) {

 
     Qrcode::where('status','10')->chunk(1000, function($Qrcodes) {
        foreach ($Qrcodes as $Qrcode) {
           
            $image_path = public_path().'/'.$Qrcode->image;
            if(file_exists($image_path))
             unlink( $image_path);
           
             $Qrcode->delete();
        }
    });
    

    dd('done');


            $alert['body']=$request->body;
            $alert['subtitle']=$request->subtitle;
            $alert['title']=$request->title;
            $alert['mutable-content']=1;
            $alert['category']="com.SmartAppCo.Wajad.expandedNotification";


            $data['payload2']['sound']="default";
            $data['payload2']['mutable-content']=1;
            $data['payload2']['category']="com.SmartAppCo.Wajad.expandedNotification";
            $data['payload2']['alert']=$alert;
         //   dd( $data);
   // $data=json_encode($data);

$body['message']= $request->body;
$body['click_action']= 'post';

    // dd($data->data[0]->en);

    $optionBuilder = new OptionsBuilder();
    $optionBuilder->setTimeToLive(60*20);

    $notificationBuilder = new PayloadNotificationBuilder($request->title);
    $notificationBuilder->setBody(

        $body['message']
        )
        ->setSound('default');

    $dataBuilder = new PayloadDataBuilder();
    $dataBuilder->addData( $data);

    $option = $optionBuilder->build();
    $notification = $notificationBuilder->build();
   $data2= $dataBuilder->build();




    $tokens=$request->fcm_token;
//$sender=new FCMSender();
    $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data2);

  //dd( $downstreamResponse )  ;
    $downstreamResponse->numberFailure();
    $downstreamResponse->numberModification();
    return json_encode($data);

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

})->name('asif_test');


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


Route::get('/testt', function(){
    $path=public_path().'/QRCodes.zip';
    if(file_exists($path))
        return  unlink( $path);
    else
        return 0;

    return 0;
    // Define Dir Folder
    $public_dir=public_path();
    // Zip File Name
    $zipFileName = 'AllDocuments.zip';
    // Create ZipArchive Obj
    $zip = new ZipArchive;
    if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
        // Add File in ZipArchive
        $zip->addFile($public_dir. '/' .'office_mark.png','file_name.png');
        // Close ZipArchive
        $zip->close();
    }
    // Set Header
    $headers = array(
        'Content-Type' => 'application/octet-stream',
    );
    $filetopath=$public_dir.'/'.$zipFileName;
    // Create Download Response
    if(file_exists($filetopath)){
        return response()->download($filetopath,$zipFileName,$headers);
    }

    // $fileurl = public_path()."/Photos.zip";
    // return \Response::download($fileurl, 'Photos.zip', ['Content-Length: '. filesize($fileurl)]);
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
        -> color(1,0, 0)
//   ->eyeColor(0, 0,0, 0, 6,120, 160)
//   ->eyeColor( 1,0,0, 0, 6,120, 160)
//   ->eyeColor( 2,0,0, 0, 6,120, 160)
        ->eyeColor(0, 0,0, 0, 14,177, 233)
        ->eyeColor( 1,0,0, 0,14,177, 233)
        ->eyeColor( 2,0,0, 0, 14,177, 233)
        ->margin(3)
        ->format('png')
        ->merge(public_path('/images/wajadfinallogo.png'), 0.2, true)
        ->style('dot',0.9)
        ->size(2000)
        ->generate(env('API_URL').'/api/scan-qr-code/'.$ImageName,
            public_path('images/qrcodes2/'.$ImageName))
    ;

    return '<br> <br> <center><img src="'.env('API_URL').'/images/qrcodes2/'.$ImageName.'" height="600" width="600"></center>';
});


Route::get('ipp', function () {


    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $keys)
    {
// check for clent ip address
        if (array_key_exists($keys, $_SERVER) === true)
        {
// get clent ip address
            foreach (explode(',', $_SERVER[$keys]) as $ip_val)
            {
// get clent ip address
// just to be safe for ip address
                $ip_val = trim($ip_val);
                if (filter_var($ip_val, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)
                {
// return ip address
                    return $ip_val;
                }
            }
        }
    }
    //dd( request());
    $ip =  request()->getClientIp(true);
    $data = \Location::get($ip);
    // dd($data);

});




Route::get('code2', function(){

    dd(request()->getClientIp(true));

});


Route::get('image', function(){
    $post=\App\Post::find(11);
    if($post->images)
        if($post->images[0])
            return env('ADMIN_URL').$post->images[0];
    //  dd(request()->getClientIp(true));

});




Route::get('deleteuserchat', function(){
    $user=\App\User::find(50);
    //dd($user);
    DeleteUserChat::dispatch($user);
    //  dd(request()->getClientIp(true));

});


Route::get('getbrandsmorethanone', function(){
    $brands=\App\Brand::whereIn('name_en', function ($q){
        $q->select('name_en')
        ->from('brands')
        ->groupBy('name_en')
        ->where('deleted_at',NULL)
        ->havingRaw('COUNT(*) > 1');
})->where('deleted_at',NULL)->get();
$array=[];

foreach($brands as $brand)
{
    array_push($array,$brand->name_en);
}
    dd($array);
    
    //  dd(request()->getClientIp(true));

});


Route::get('deletebrands', function(){
    //$authors = Author::doesnthave('books')->get();
    $brands=\App\Brand::doesnthave('subcategories')->where('deleted_at',NULL)->get();
   /// dd( $brands);
$array=[];

foreach($brands as $brand)
{
    $brand->delete();
}
    dd($array);
    
    //  dd(request()->getClientIp(true));

});

Route::get('contact-us', 'ContactController@getContact');
Route::post('contact-us', 'ContactController@saveContact');
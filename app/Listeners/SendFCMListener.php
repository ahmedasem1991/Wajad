<?php

namespace App\Listeners;

use App\FcmUser;
use LaravelFCM\Facades\FCM;
use App\Events\SendFCMEvent;
use LaravelFCM\Message\OptionsBuilder;
use Illuminate\Queue\InteractsWithQueue;
use LaravelFCM\Message\OptionsPriorities;
use LaravelFCM\Message\PayloadDataBuilder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Edujugon\PushNotification\PushNotification;
use LaravelFCM\Message\PayloadNotificationBuilder;
use Illuminate\Notifications\Messages\BroadcastMessage;

class SendFCMListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendFCMEvent  $event
     * @return void
     */
    public function handle(SendFCMEvent $event)
    {
        $user = $event->user;
        $data = $event->data;
    //     $push = new PushNotification('fcm');
    //     $response = $push->setMessage($data)
    //     ->setApiKey(env('FCM_SERVER_KEY'))
    //     ->setDevicesToken($tokens)
    //    // ->sendByTopic('WAJAD')->getFeedback();
    //    ->send()
    //    ->getFeedback();

    //     dd($response);

    $optionBuiler = new OptionsBuilder();
    $optionBuiler->setTimeToLive(60 * 20);
    $optionBuiler->setPriority( OptionsPriorities::high );
    $option = $optionBuiler->build();

    $badge_number = (isset($data['badge']) && $data['badge'] > 0) ? (int) $data['badge'] : 0;

    $notificationBuilder_ar = new PayloadNotificationBuilder($data['ar']['title']);
    $notificationBuilder_ar->setBody($data['ar']['body']);
    $notificationBuilder_ar->setSound( 'default' );
    $notificationBuilder_ar->setBadge($badge_number);

    $notificationBuilder_en = new PayloadNotificationBuilder($data['en']['title']);
    $notificationBuilder_en->setBody($data['en']['body']);
    $notificationBuilder_en->setSound('default');
    $notificationBuilder_en->setBadge($badge_number);

    $dataBuilder_ar = new PayloadDataBuilder();
    $dataBuilder_en = new PayloadDataBuilder();

    $info = [];
    $info['ar'] = [
        'title' => $data['ar']['title'],
        'body' => $data['ar']['body'],
        'id' => $data['id'],
        'type' => $data['type'],
        'deeplink' => $data['deeplink'],
        'post' => $data['post'],
        'item' => $data['item'],
        'image' => (isset($data['image'])) ? $data['image'] : null ,
        'url' => (isset($data['url'])) ? $data['url'] : null ,

         
    ];
    $info['en'] = [
        'title' => $data['en']['title'],
        'body' => $data['en']['body'],
        'id' => $data['id'],
        'type' => $data['type'],
        'deeplink' => $data['deeplink'],
        'post' => $data['post'],
        'item' => $data['item'],
        'image' => (isset($data['image'])) ? $data['image'] : null ,
        'url' => (isset($data['url'])) ? $data['url'] : null ,
        
    
    ];

    $data_ar=[
        'payload' =>$info['ar']
    ];
    $data_en=[
        'payload' =>$info['en']
    ];



    $dataBuilder_ar->addData( $data_ar );
    $dataBuilder_en->addData( $data_en );

    $notification_ar = $notificationBuilder_ar->build();
    $notification_en = $notificationBuilder_en->build();

    $data_ar = $dataBuilder_ar->build();
    $data_en = $dataBuilder_en->build();

    $ios_tokens_ar = [];
    $ios_tokens_en = [];
    $android_tokens_ar = [];
    $android_tokens_en = [];


        //all android tokens
        $android_tokens_ar = (isset($user->devices)) ? $user->devices()->android()->lang('ar')->pluck('token')->toArray(): [];
        $android_tokens_en = (isset($user->devices)) ? $user->devices()->android()->lang('en')->pluck('token')->toArray() : [];
    
        //all ios tokens
        $ios_tokens_ar = (isset($user->devices)) ? $user->devices()->ios()->lang('ar')->pluck('token')->toArray(): [];
        $ios_tokens_en = (isset($user->devices))? $user->devices()->ios()->lang('en')->pluck('token')->toArray() :[];

     



    if( count($android_tokens_ar) > 0 ){
        $andResponse = FCM::sendTo($android_tokens_ar, $option, $notification_ar, $data_ar);
        
        $and_tok_del = $andResponse->tokensToDelete();
        FcmUser::deleteTokens($and_tok_del);
        $and_tok_err = $andResponse->tokensWithError();
        FcmUser::deleteTokens($and_tok_err);
    }

    if( count($android_tokens_en) > 0 ){
        $andResponse = FCM::sendTo($android_tokens_en, $option, $notification_en, $data_en);
     
        $and_tok_del = $andResponse->tokensToDelete();
        FcmUser::deleteTokens($and_tok_del);
        $and_tok_err = $andResponse->tokensWithError();
        FcmUser::deleteTokens($and_tok_err);
    }
    if( count($ios_tokens_ar) > 0 ){
        $iosResponse = FCM::sendTo($ios_tokens_ar, $option, $notification_ar, $data_ar);
     
        $ios_tok_del = $iosResponse->tokensToDelete();
        FcmUser::deleteTokens($ios_tok_del);
        $ios_tok_err = $iosResponse->tokensWithError();
        FcmUser::deleteTokens($ios_tok_err);
    }

    if( count($ios_tokens_en) > 0 ){
        $iosResponse = FCM::sendTo($ios_tokens_en, $option, $notification_en, $data_en);
        
        $ios_tok_del = $iosResponse->tokensToDelete();
        FcmUser::deleteTokens($ios_tok_del);
        $ios_tok_err = $iosResponse->tokensWithError();
        FcmUser::deleteTokens($ios_tok_err);
    }

    

    
    $notification = [
        'action' => __CLASS__ . '@send',
        'options' => $data,
        'android' => [
            'ar' => [
                'tokens' => $android_tokens_ar,
            ],
            'en' => [
                'tokens' => $android_tokens_en,
            ],
        ],			
        'ios' => [
            'ar' => [
                'tokens' => $ios_tokens_ar,
            ],
            'en' => [
                'tokens' => $ios_tokens_en,
            ],
        ],
    ];
     logger($data_en);
   // \Log::info($notification);
     

    }
}

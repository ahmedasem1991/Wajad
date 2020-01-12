<?php

namespace App\Listeners;

use App\Events\SendFCMEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Edujugon\PushNotification\PushNotification;

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
        $tokens = $event->tokens;
        $data = $event->data;
        $push = new PushNotification('fcm');
        $response = $push->setMessage($data)
        ->setApiKey(env('FCM_SERVER_KEY'))
        ->setDevicesToken($tokens)
        ->sendByTopic('WAJAD');
        dd($response);

    }
}

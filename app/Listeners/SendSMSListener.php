<?php

namespace App\Listeners;

use App\Events\SendSMSEvent;

class SendSMSListener
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
     * @return void
     */
    public function handle(SendSMSEvent $event)
    {
        logger('before send');
        \Unifonic::send($event->phone_number, $event->message, 'WAJAD');
        logger('after send');
    }
}

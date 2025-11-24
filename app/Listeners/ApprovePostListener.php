<?php

namespace App\Listeners;

use App\Events\SendSMSEvent;

class ApprovePostListener
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
     * @param  SendSMSEvent  $event
     * @return void
     */
    public function handle($event)
    {
        // $event->resource->open_status =1;
        // $event->resource->appearance_status =0;
        $event->resource->approval_status = 1;
        // $event->resource->end_date=  null;
        $event->resource->save();
    }
}

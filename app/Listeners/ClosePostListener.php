<?php

namespace App\Listeners;

use App\Events\SendSMSEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClosePostListener
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
        $event->resource->open_status =0;
        $event->resource->appearance_status =0;
        $event->resource->end_date=  now();
        $event->resource->save();
    }
}

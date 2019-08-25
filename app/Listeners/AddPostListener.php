<?php

namespace App\Listeners;

use App\Events\AddPostEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddPostListener
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
     * @param  AddPost  $event
     * @return void
     */
    public function handle(AddPostEvent $event)
    {
         
    }
}

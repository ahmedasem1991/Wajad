<?php

namespace App\Listeners;

use App\Events\AddPostEvent;

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
    public function handle(AddPostEvent $event) {}
}

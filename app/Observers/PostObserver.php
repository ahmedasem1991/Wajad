<?php

namespace App\Observers;

use App\Post;
use Carbon\Carbon;
use App\AssignQrcode;
use App\GenerateQrcode;
use Illuminate\Support\Str;
use App\Jobs\AssignQrcodeJob;
use App\Jobs\GenerateQrcodeJob;
use Illuminate\Support\Facades\Log;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Post $Post
     * @return void
     */
    public function saving(Post $Post)
    {
             if(Auth()->User()->isCorporateAdmin() )
             {
                 
                $Post->appearance_status=1;
                $Post->open_status=1;
                $Post->approval_status=1;
                $Post->corporate_id=Auth()->User()->corporate_id;
             }
       
    }
    public function saved(Post $Post)
    {
        
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Post $Post
     * @return void
     */
    public function updated(Post $Post)
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Post $Post
     * @return void
     */
    public function deleted(Post $Post)
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Post $Post
     * @return void
     */
    public function restored(Post $Post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Post $Post
     * @return void
     */
    public function forceDeleted(Post $Post)
    {
        //
    }
}

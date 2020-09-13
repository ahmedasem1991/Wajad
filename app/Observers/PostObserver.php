<?php

namespace App\Observers;

use App\Post;
use Carbon\Carbon;
use App\AssignQrcode;
use App\GenerateQrcode;
use Illuminate\Support\Str;
use App\Jobs\AssignQrcodeJob;
use App\Jobs\GenerateQrcodeJob;
use App\Question;
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

        if (Auth()->User()->isCorporateAdmin()) {
            //$Post->appearance_status = 1;
            //$Post->open_status = 1;
            $Post->approval_status = 1;
            $Post->corporate_id = Auth()->User()->corporate_id;
            $Post->publisher_id = Auth()->User()->id;
            $Post->publisher_type = 2;
            $Post->end_date = $Post->end_date;
        }
        if (Auth()->check() && Auth()->User()->isAdmin()) {
            $Post->publisher_type = 3;
            $Post->publisher_id = ($Post->owner_id) ? $Post->owner_id: $Post->founder_id;
            $Post->end_date = $Post->end_date;
        }
    }

    public function saved(Post $Post)
    {
        if (Auth()->User()->isCorporateAdmin() || Auth()->User()->isAdmin() ) {
            $question= $Post->question;
            if($question=='' || $question == null) {
                $question = null;
            }else {
                Question::create([
                    'corporate_id' => Auth()->User()->corporate_id,
                    'post_id' => $Post->id,
                    'question' => $question,
                ]);
            }
        }
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

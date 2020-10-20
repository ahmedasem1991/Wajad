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
            //$Post->approval_status = 1;
            $Post->corporate_id = Auth()->User()->corporate_id;
            $Post->publisher_id = Auth()->User()->id;
            $Post->publisher_type = 2;
            $Post->end_date = $Post->end_date;
            if( ! $Post->isDirty('appearance_status'))
            $Post->appearance_status = 1;
            if( ! $Post->isDirty('open_status'))
            $Post->open_status = 1;
            if( ! $Post->isDirty('approval_status'))
            $Post->approval_status = 1;
        }
        if (Auth()->check() && Auth()->User()->isAdmin()) {

            $publisher_id=($Post->owner_id) ? $Post->owner_id: $Post->founder_id;
            if( !$publisher_id)
            $publisher_id=Auth()->User()->id;
            $Post->publisher_type = 3;
            $Post->publisher_id =  $publisher_id;
            $Post->end_date = $Post->end_date;
            if( ! $Post->isDirty('appearance_status'))
            $Post->appearance_status = 1;
            if( ! $Post->isDirty('open_status'))
            $Post->open_status = 1;
            if( ! $Post->isDirty('approval_status'))
            $Post->approval_status = 1;
            

        }
    }

    public function saved(Post $Post)
    {
        if (Auth()->User()->isCorporateAdmin() || Auth()->User()->isAdmin() ) {

            $question= $Post->question_1;
            if($question=='' || $question == null) {
                $question = null;
            }else {
                Question::firstOrCreate([
                    'corporate_id' => Auth()->User()->corporate_id,
                    'post_id' => $Post->id,
                    'question' => $question,
                ]);
            }

            $question= $Post->question_2;
            if($question=='' || $question == null) {
                $question = null;
            }else {
                Question::firstOrCreate([
                    'corporate_id' => Auth()->User()->corporate_id,
                    'post_id' => $Post->id,
                    'question' => $question,
                ]);
            }

            $question= $Post->question_3;
            if($question=='' || $question == null) {
                $question = null;
            }else {
                Question::firstOrCreate([
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
        
            if (Auth()->User()->isCorporateAdmin() || Auth()->User()->isAdmin() ) {
    
                //this for update
                if($Post->questions)
                {
                   
                    $question= $Post->question_1;
                    if($question=='' || $question == null) {
                        $Post->questions->take(1)->delete();
                    }else {
                        $question_1 =$Post->questions->first();
                        $question_1->update([
                           
                            'question' => $question,
                        ]);
                    }

                    $question= $Post->question_2;
                    if($question=='' || $question == null) {
                        $get_question= $Post->questions->skip(1)->take(1)->first();
                        if($get_question)
                          $get_question->delete();
                    }else {
                        $question_2 =$Post->questions->skip(1)->take(1)->first();
                       if( $question_2)
                       {
                        $question_2->update([
                           
                            'question' => $question,
                        ]);
                       }

                    }

                    $question= $Post->question_3;
                    if($question=='' || $question == null) {
                        $get_question=$Post->questions->skip(2)->take(1)->first();
                        if($get_question)
                        $get_question->delete();
                    }else {
                        $question_3 =$Post->questions->skip(2)->take(1)->first();
                       if(  $question_3)
                       {
                        $question_3->update([
                           
                            'question' => $question,
                        ]);
                       }

                    }
    
                }
            }
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

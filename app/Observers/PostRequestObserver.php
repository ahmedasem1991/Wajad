<?php

namespace App\Observers;

use App\Post;
use App\PostRequest;

class PostRequestObserver
{

    public function saving(PostRequest $postRequest)
    {
        if(Auth()->check())
        {
         
            if($postRequest->is_request_valid==0){
                $postRequest->rejected_at=now()->toDatetimeString();
            }else{
            $postRequest->rejected_at=NULL;
            $Post= Post::find($postRequest->post_id);
            $Post->owner_id=$postRequest->user_id;
            $Post->save();


            $PostRequests=PostRequest::where('post_id',$postRequest->post_id)->where('id','!=',$postRequest->id)->get();
       
                foreach($PostRequests as $PostRequest)
                {
                    $PostRequests->is_request_valid=0;
                    $postRequest->rejected_at=now()->toDatetimeString();
                   // $PostRequests->save();
                }
           
             
            }
           
            
        }
    }
    /**
     * Handle the post request "created" event.
     *
     * @param  \App\PostRequest  $postRequest
     * @return void
     */
    public function created(PostRequest $postRequest)
    {
        //
    }

        /**
     * Handle the post request "updated" event.
     *
     * @param  \App\PostRequest  $postRequest
     * @return void
     */
    public function updating(PostRequest $postRequest)
    {
        $PostRequests=PostRequest::where('post_id',$postRequest->post_id)->where('id','!=',$postRequest->id)->get();
        if($postRequest->is_request_valid==1){
            foreach($PostRequests as $PostRequest)
            {
                $PostRequests->is_request_valid=0;
                $postRequest->rejected_at=now()->toDatetimeString();
                //$PostRequests->save();
            }
        }
    }

    /**
     * Handle the post request "updated" event.
     *
     * @param  \App\PostRequest  $postRequest
     * @return void
     */
    public function updated(PostRequest $postRequest)
    {
        $PostRequests=PostRequest::where('post_id',$postRequest->post_id)->where('id','!=',$postRequest->id)->get();
        if($postRequest->is_request_valid==1){
            foreach($PostRequests as $PostRequest)
            {
                $PostRequests->is_request_valid=0;
                $postRequest->rejected_at=now()->toDatetimeString();
                //$PostRequests->save();
            }
        }
    }

    /**
     * Handle the post request "deleted" event.
     *
     * @param  \App\PostRequest  $postRequest
     * @return void
     */
    public function deleted(PostRequest $postRequest)
    {
        //
    }

    /**
     * Handle the post request "restored" event.
     *
     * @param  \App\PostRequest  $postRequest
     * @return void
     */
    public function restored(PostRequest $postRequest)
    {
        //
    }

    /**
     * Handle the post request "force deleted" event.
     *
     * @param  \App\PostRequest  $postRequest
     * @return void
     */
    public function forceDeleted(PostRequest $postRequest)
    {
        //
    }
}

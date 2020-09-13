<?php

namespace App\Observers;

use App\Post;
use App\User;
use App\PostRequest;
use App\Notifications\SendFCMNotification;

class PostRequestObserver
{

    public function saving(PostRequest $postRequest)
    {

            if($postRequest->is_request_valid==0){
                $postRequest->rejected_at=now()->toDatetimeString();
            }else{
            $postRequest->rejected_at=NULL;
            $Post= Post::find($postRequest->post_id);
            $Post->owner_id=$postRequest->user_id;
            $Post->save();
      }
 
    }
    public function saved(PostRequest $postRequest)
    {
        $PostRequests=PostRequest::where('post_id',$postRequest->post_id)->where('id','!=',$postRequest->id)->get();
            
        $dispatcher = PostRequest::getEventDispatcher();
        if($postRequest->is_request_valid==1){
           
            PostRequest::unsetEventDispatcher();
                foreach($PostRequests as $PostRequest)
                {
                    $PostRequest->is_request_valid=0;
                    $PostRequest->rejected_at=now()->toDatetimeString();
                    $PostRequest->comment='Rejected by system';
                    $PostRequest->save();
                }
                PostRequest::setEventDispatcher($dispatcher);


                $request_user=User::find($postRequest->user_id);
                $post=Post::find($postRequest->post_id);
                //send FCM
                $badge =getBadge($request_user);
                $data=sendAcceptPostRequestFCM(auth()->user(),$post,$badge,$postRequest->id);
                $request_user->notify(new SendFCMNotification($request_user,$data));
            }else{
                
                $request_user=User::find($postRequest->user_id);
                $post=Post::find($postRequest->post_id);
                //send FCM
                $badge =getBadge($request_user);
                $data=sendRejectPostRequestFCM(auth()->user(),$post,$badge,$postRequest->id);
                $request_user->notify(new SendFCMNotification($request_user,$data));
        
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
  
         
            if($postRequest->is_request_valid==0){
                $postRequest->rejected_at=now()->toDatetimeString();
            }else{
            $postRequest->rejected_at=NULL;
            $Post= Post::find($postRequest->post_id);
            $Post->owner_id=$postRequest->user_id;
            $Post->save();
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
        // $PostRequests=PostRequest::where('post_id',$postRequest->post_id)->where('id','!=',$postRequest->id)->get();
            
        // $dispatcher = PostRequest::getEventDispatcher();
        // if($postRequest->is_request_valid==1){
        // PostRequest::unsetEventDispatcher();
        //     foreach($PostRequests as $PostRequest)
        //     {
        //         $PostRequest->is_request_valid=0;
        //         $PostRequest->rejected_at=now()->toDatetimeString();
        //         $PostRequest->comment='Rejected by system';
        //         $PostRequest->save();
        //     }
        //     PostRequest::setEventDispatcher($dispatcher);
       
        // }
   
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

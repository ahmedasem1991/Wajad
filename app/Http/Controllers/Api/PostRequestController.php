<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\PostRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\SendFCMNotification;

class PostRequestController extends Controller
{
    public function  __invoke(Request $request, Post $post)
    {
   $post_request=     PostRequest::create([
            'post_id' => $post->id,
            'user_id' => auth('api')->user()->id,
        ]);

          //send FCM
          $badge =getBadge($post->founder);
          $data=sendPostRequestFCM($post->founder,auth('api')->user(),$post,$badge,$post_request->id);
          $post->founder->notify(new SendFCMNotification($post->founder,$data));


        $this->addResponse(trans('messages.created', ['model' => trans('messages.attributes.post_request')]))->addStatusCode(201);

        return $this->response();
    }
}

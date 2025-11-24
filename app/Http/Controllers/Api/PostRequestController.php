<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Notifications\BroadcastNotification;
use App\Notifications\SendFCMNotification;
use App\Post;
use App\PostRequest;
use App\User;
use Illuminate\Http\Request;
use Laravel\Nova\Nova;

class PostRequestController extends Controller
{
    public function __invoke(Request $request, Post $post)
    {
        $p = PostRequest::where('post_id', '=', $post->id)->where('user_id', '=', auth('api')->user()->id)->get();

        if (! $p->isEmpty()) {
            throw new ApiException('You Already Made A Request', 401);
        }

        $post_request = PostRequest::create([
            'post_id' => $post->id,
            'user_id' => auth('api')->user()->id,
        ]);

        if ($post->corporate_id != null) {
            // send Broadcast Notification
            $level = 'info';
            $message = 'You had a new post request for your post "'.$post->title.' "';
            $url = Nova::path().'/resources/posts/'.$post->id;
            User::find($post->publisher_id)->notify(new BroadcastNotification($level, $message, $url));

        } else {
            // send FCM
            $badge = getBadge($post->founder);
            $data = sendPostRequestFCM($post->founder, auth('api')->user(), $post, $badge, $post_request->id);
            $post->founder->notify(new SendFCMNotification($post->founder, $data));

        }

        $this->addResponse(trans('messages.created', ['model' => trans('messages.attributes.post_request')]))->addStatusCode(201);

        return $this->response();
    }
}

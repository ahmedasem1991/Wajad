<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\User;
use App\PostRequest;
use Illuminate\http\Request;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Notifications\SendFCMNotification;

/**
 * @group Post Request
 */
class AcceptPostRequestController extends Controller
{
    /**
     * This Post Request is his
     * @urlParam post_id required int exists in posts
     * @bodyParam user_id required int exists in users
     * @bodyParam comment  text 
     * @bodyParam token Barier-token required
     * @response {
     * "success": true,
     *  "message": "Post request accepted successfully.",
     *   "status_code": 200
     *}
     * @return void
     */
    public function  __invoke(Request $request, Post $post)
    {
        dd($request->user_id);
        $validate_request = Validator::make($request->all(), [
            'user_id' => ['required','exists:users,id'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        if ($post->publisher_id !== auth('api')->user()->id) {
            throw new ApiException(trans('auth.not_authorized'), 400);
        }

        $postRequest = PostRequest::where('post_id', $post->id)->where('user_id', $request->user_id)->first();
        $postRequest->update(['is_request_valid' => true, 'comment' => $request->input('comment')]);
        $post->update(['owner_id' => $request->user_id]);

        $request_user=User::find($request->user_id);
        //send FCM
        $badge =getBadge($request_user);
        $data=sendAcceptPostRequestFCM($post->founder,$post,$badge,$postRequest->id);
        $request_user->notify(new SendFCMNotification($request_user,$data));

        $this->addResponse(trans('messages.accepted', ['model' => trans('messages.attributes.post_request')]))->addStatusCode(201);

        return $this->response();
    }
}

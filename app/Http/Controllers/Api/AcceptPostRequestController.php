<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\PostRequest;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Post Request
 */
class AcceptPostRequestController extends Controller
{
    /**
     * This Post Request is his
     * @urlParam post_id required int exists in posts
     * @response {
     * "success": true,
     *  "message": "Post request accepted successfully.",
     *   "status_code": 200
     *}
     * @return void
     */
    public function  __invoke(Request $request, Post $post)
    {
        $validate_request = Validator::make($request->all(), [
            'user_id' => ['required', 'int', 'exists:users,id'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        if ($post->publisher_id !==  $request->user_id) {
            throw new ApiException(trans('auth.not_authorized'), 400);
        }

        $postRequest = PostRequest::where('post_id', $post->id)->where('user_id', $request->user_id)->first();
        $postRequest->update(['is_request_valid' => true]);
        $post->update(['owner_id' => $request->user_id]);

        $this->addResponse(trans('messages.accepted', ['model' => trans('messages.attributes.post_request')]))->addStatusCode(201);

        return $this->response();
    }
}

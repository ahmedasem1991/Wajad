<?php

namespace App\Http\Controllers\Api;

 
use App\Post;
use App\Nova\User;
use App\PostRequest;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @group Post Request
 */
class RejectPostRequestController extends Controller
{

    /**
     * Reject Post Request  
     * @urlParam post_id required int exists in posts
     * @response {
     * "success": true,
     *  "message": "Post request rejected successfully.",
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

        $user = User::find($request->user_id);
        $user->increment('claimer');

        $this->addResponse(trans('messages.rejected', ['model' => trans('messages.attributes.post_request')]))->addStatusCode(201);

        return $this->response();
    }
}

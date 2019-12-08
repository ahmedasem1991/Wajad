<?php

namespace App\Http\Controllers\Api;

use App\Item;
use App\PostRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nova\Post;

/**
 * @group Item Request
 */
class PostRequestController extends Controller
{
    /**
     * Create Post Request
     * @urlParam post_id required int, exists in posts
     * @response {
     * "success": true,
     *  "message": "Post request created successfully.",
     *   "status_code": 200
     *}
     * @return void
     */
    public function  __invoke(Request $request, Post $post)
    {
        PostRequest::create([
            'item_id' => $post->id,
            'user_id' => auth('api')->user()->id,
        ]);

        $this->addResponse(trans('messages.created', ['model' => trans('messages.attributes.item_request')]))->addStatusCode(201);

        return $this->response();
    }
}

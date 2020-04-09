<?php

namespace App\Http\Controllers\Api;

use App\PostRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostRequestController extends Controller
{
    public function  __invoke(Request $request, Post $post)
    {
        PostRequest::create([
            'post_id' => $post->id,
            'user_id' => auth('api')->user()->id,
        ]);

        $this->addResponse(trans('messages.created', ['model' => trans('messages.attributes.post_request')]))->addStatusCode(201);

        return $this->response();
    }
}

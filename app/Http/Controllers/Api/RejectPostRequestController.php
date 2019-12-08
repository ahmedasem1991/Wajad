<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;

class RejectPostRequestController extends Controller
{
    public function __invoke(Post $post)
    {
        $user = auth('api')->user();

        if ($post->publisher_id !== $user->id) {
            throw new ApiException(trans(''), 400);
        }


    }
}

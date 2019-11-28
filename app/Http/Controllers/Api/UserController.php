<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class UserController extends Controller
{
    public function userPosts()
    {
        return  PostResource::collection(Post::where('publisher_id', auth('api')->user()->id)
            ->isShow()->isOpen()->isApproved()->get());
    }
}

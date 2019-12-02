<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class UserController extends Controller
{
    const TYPES = [
        'lost' => 0,
        'found' => 1,
    ];
    public function userPosts($type = null)
    {
        if (!is_null($type) && in_array($type, self::TYPES)) {
            if ($type == 'lost') {
                return $this->userLostPosts();
            }
            if ($type == 'found') {
                return $this->userFoundPosts();
            }
        }
    }

    public function userLostPosts()
    {
        return PostResource::collection(Post::where('publisher_id', auth('api')->user()->id)
            ->lost()->isShow()->isOpen()->isApproved()->get());
    }

    public function userFoundPosts()
    {
        return PostResource::collection(Post::where('publisher_id', auth('api')->user()->id)
            ->found()->isShow()->isOpen()->isApproved()->get());
    }
}

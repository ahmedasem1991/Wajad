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
    public function Posts($type = null)
    {
        if (!is_null($type) && in_array($type, self::TYPES)) {
            return PostResource::collection(
                auth('api')->user()->posts()
                    ->isShow()->isOpen()->isApproved()->get()
            );
        }
    }
}

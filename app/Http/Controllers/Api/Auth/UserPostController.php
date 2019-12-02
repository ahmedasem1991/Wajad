<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class UserPostController extends Controller
{
    const TYPES = [
        'lost',
        'found'
    ];

    public function __invoke(Request $request, $type)
    {
        if (!in_array($type, self::TYPES)) {
            throw new ApiException(trans(''), 404);
        }

        return PostResource::collection(auth('api')->user()->posts()->$type()->get());
    }
}

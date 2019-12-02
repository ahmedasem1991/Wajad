<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UserDataController extends Controller
{
    public function __invoke()
    {
        return new UserResource(auth('api')->user());
    }
}

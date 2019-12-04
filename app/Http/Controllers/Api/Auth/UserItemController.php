<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Api\ApiException;
use App\Http\Resources\ItemResource;

class UserItemController extends Controller
{
    public function __invoke(Request $request)
    {
        throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.item')]), 404);

        return ItemResource::collection(auth('api')->user()->items()->get());
    }
}

<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Services\UserService;

class ResendCodeController extends Controller
{
    private $types = [
        'phone', 'email'
    ];

    public function __invoke($type)
    {
        if (!in_array($type, $this->types)) {
            throw new ApiException(trans(''), 404);
        }

        if ((new UserService)->createAndSendActivationCode(auth('api')->user(), $type)) {

            $this->addStatusCode(201);

            $this->addResponse(trans(''));

            return $this->response();
        }

        throw new ApiException(trans(''), 400);
    }
}

<?php

namespace App\Http\Controllers\Api\Auth;

use App\Services\UserService;
use App\Mail\EmailVerificationCode;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;

class ChangeEmailController extends Controller
{
    public function __invoke()
    {
        $user = auth('api')->user();

        if ($user->hasVerifiedEmail()) {
            throw new ApiException(trans('email.verified'), 400);
        }

        if ((new UserService)->createAndSendActivationCode($user, 'email')) {
            $this->addResponse(trans('email.sent'))->addStatusCode(201);

            return $this->response();
        }

        throw new ApiException(trans('email.verified'), 400);
    }
}

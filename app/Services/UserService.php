<?php

namespace App\Services;

use App\UserVerifications;
use App\Exceptions\Api\ApiException;
use App\User;

class UserService
{
    public function verifyActivationCode(User $user, $code)
    {
        $user_verificatioin =  $user->userVerification ?? null;

        if (!$user_verificatioin) {
            throw new ApiException(trans('auth.failed'), 400);
        }

        if ($user_verificatioin->verification_code !== (int) $code) {
            throw new ApiException(trans('auth.wrong_code'), 400);
        }

        if ($user_verificatioin->attempt > 3) {
            throw new ApiException(trans('auth.verification_code_exceeded'), 400);
        }

        $user_verificatioin->increment('attempt');
    }
}

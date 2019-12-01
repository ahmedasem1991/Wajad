<?php

namespace App\Services;

use App\User;
use App\Exceptions\Api\ApiException;

class UserService
{
    public function verifyActivationCode(User $user, $code)
    {
        # GET USER VERIFICATION RECORD
        $user_verificatioin = $user->userVerification ?? null;

        if (!$user_verificatioin) {
            throw new ApiException(trans('auth.failed'), 400);
        }

        # MATCH CODE WITH CODE
        if ($user_verificatioin->code !== $code) {
            throw new ApiException(trans('auth.wrong_code'), 400);
        }

        # CHECK IF EXCEEDED TIME
        if ($user_verificatioin->attempt > 3) {
            throw new ApiException(trans('auth.verification_code_exceeded'), 400);
        }

        $user_verificatioin->increment('attempt');
    }
}

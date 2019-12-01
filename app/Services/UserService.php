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
            throw new ApiException(trans('auth.failed'));
        }

        # MATCH CODE WITH CODE
        if ($user_verificatioin->code !== $code) {
            throw new ApiException(trans('auth.wrong_code'));
        }

        # CHECK IF EXCEEDED TIME
        if ($user_verificatioin->attemps > 3) {
            throw new ApiException(trans('auth.verification_code_exceeded'));
        }

        $user_verificatioin->increment('attemps');
    }
}

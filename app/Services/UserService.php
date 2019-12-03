<?php

namespace App\Services;

use App\User;
use App\UserVerifications;
use App\Services\SmsProvider;
use App\Mail\EmailVerificationCode;
use App\Exceptions\Api\ApiException;
use Illuminate\Support\Facades\Mail;

class UserService
{
    /**
     * Veriify Code For User
     *
     * @param User $user
     * @param Integer $code
     * @return void
     */
    public function verifyActivationCode(User $user, $code, $code_valid_for)
    {
        $user_verificatioin =  $user->userVerification ?? null;

        if (!$user_verificatioin) {
            throw new ApiException(trans('auth.something_wrong'), 400);
        }

        if ($user_verificatioin->verification_code !== (int) $code) {
            $user_verificatioin->increment('attempt');
            throw new ApiException(trans('auth.wrong_code'), 400);
        }

        if ($user_verificatioin->attempt >= 3) {
            throw new ApiException(trans('auth.verification_code_exceeded'), 400);
        }

        if ($code_valid_for == 'phone') {
            if (!$user_verificatioin->codeValidForMobileNumber()) {
                throw new ApiException(trans('auth.wrong_code'), 400);
            }

            $user->update([
                'is_mobile_number_verified' => true
            ]);

            $user->userVerification()->delete();
        }

        if ($code_valid_for == 'email') {
            if (!$user_verificatioin->codeValidForEmail()) {
                throw new ApiException(trans('auth.wrong_code'), 400);
            }

            $user->update([
                'email_verified_at' => now()
            ]);

            $user->userVerification()->delete();
        }
    }

    /**
     * Create And Send Activation Code For User
     *
     * @param User $user
     * @param String[mobile_number|email] $code_valid_for
     * @return void
     */
    public function createAndSendActivationCode(User $user, $code_valid_for)
    {
        if ($user->userVerification) {
            if ($user->userVerification()->sendCodeWithinMinute()) {
                throw new ApiException(trans('auth.verification_code_wait_time_one_minute'));
            }

            $user->userVerification()->delete();
        }

        $activation_code = env('STATIC_VERIFICATION_CODE', rand(1000, 9999));

        $user->userVerification()->create([
            'verification_code' => $activation_code,
            'code_valid_for' => $code_valid_for
        ]);

        if ($code_valid_for == 'mobile_number') {
            $message = 'Wajad, Register activation code is ' . $activation_code;

            (new SmsProvider)->sendMessage($message, $user->mobile_number);

            return true;
        }

        if ($code_valid_for == 'email') {
            Mail::send($user->email, new EmailVerificationCode($activation_code));

            return true;
        }

        return false;
    }
}

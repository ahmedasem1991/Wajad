<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;

class ResendCodeController extends Controller
{
    public function __invoke()
    {
        $validate_resend_code = Validator::make(request()->all(), [
            'unverified_user_id' => ['required', 'exists:users,id'],
        ]);

        if ($validate_resend_code->fails()) {
            throw new ApiException($validate_resend_code->errors()->first());
        }

        $user_verification = UserVerifications::find(request('unverified_user_id'));

        if ($user_verification->sendCodeWithinMinute()) {
            throw new ApiException(trans('auth.verification_code_wait_time_one_minute'));
        }

        $user_verification->update(['attemp' => 0]);

        $activation_code =  $user_verification->activation_code;

        $mobile_number =  $user_verification->mobile_number;

        $message = 'Wajad, Register activation code is ' . $activation_code;

        $this->smsProvider->sendMessage($message, $mobile_number);

        return $this->jsonResponse([
            'data' => [
                "unverified_user_id" => $user_verification->id,
                "message" => trans('auth.verification_code_sent'),
            ]
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api\Auth;


use Illuminate\Http\Request;
use App\Services\UserService;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;

class VerifyPhoneOrEmailController extends Controller
{
    private $verification_types = [
        'phone', 'email'
    ];

    public function __invoke(Request $request, $type)
    {
        $user = auth('api')->user();

        (new UserService)->verifyActivationCode($user, $request->code);

        if (!in_array($type, $this->verification_types)) {
            throw new ApiException(trans('auth.failed'), 404);
        }

        if ($type == 'phone') {
            if ($user->userVerification->codeValidForMobileNumber()) {
                $user->update([
                    'is_mobile_number_verified' => true
                ]);
            }

            throw new ApiException(trans('auth.wrong_code'), 400);
        }

        if ($type == 'email') {
            if ($user->userVerification->codeValidForEmail()) {
                $user->update([
                    'email_verified_at' => now()
                ]);
            }

            throw new ApiException(trans('auth.wrong_code'), 400);
        }

        $this->addStatusCode(200);

        $this->addResponse(trans("auth.verified_successfully", ['Type' => \Str::title($type)]));

        return $this->response();
    }
}

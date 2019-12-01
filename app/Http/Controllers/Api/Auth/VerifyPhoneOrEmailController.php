<?php

namespace App\Http\Controllers\Api\Auth;


use Illuminate\Http\Request;
use App\Services\UserService;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VerifyPhoneOrEmailController extends Controller
{
    private $verification_types = [
        'phone', 'email'
    ];

    public function __invoke(Request $request, $type)
    {
        $user = auth('api')->user();

        $validate_for_code = Validator::make($request->all(), [
            'code' => ['required', 'numeric', 'digits:4']
        ]);

        if ($validate_for_code->fails()) {
            throw new ApiException($validate_for_code->errors()->first(), 400);
        }

        (new UserService)->verifyActivationCode($user, $request->code);

        if (!in_array($type, $this->verification_types)) {
            throw new ApiException(trans('auth.failed'), 404);
        }

        if ($type == 'phone') {
            if (!$user->userVerification->codeValidForMobileNumber()) {
                throw new ApiException(trans('auth.wrong_code'), 400);
            }

            $user->update([
                'is_mobile_number_verified' => true
            ]);
        }

        if ($type == 'email') {
            if (!$user->userVerification->codeValidForEmail()) {
                throw new ApiException(trans('auth.wrong_code'), 400);
            }

            $user->update([
                'email_verified_at' => now()
            ]);
        }

        $user->userVerification()->delete();

        $this->addStatusCode(200);

        $this->addResponse(trans("auth.verified_successfully", ['Type' => \Str::title($type)]));

        return $this->response();
    }
}

<?php

namespace App\Http\Controllers\Api\Auth;

use App\Services\UserService;
use App\Mail\EmailVerificationCode;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

/**
 * @group User Profile
 */

class ChangeEmailController extends Controller
{
    /**
     * Change Email
     *
     * @bodyParam email email,required. Example: example@example.com
     *
     * @response {
     *
     * }
     * */
    public function __invoke()
    {
        $user = auth('api')->user();

        $validate_email_request = Validator::make(request()->all(), [
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)]
        ]);

        if ($validate_email_request->fails()) {
            throw new ApiException($validate_email_request->errors()->first(), 400);
        }

        $user->update([
            'email' => request('email'),
            'email_verified_at' => null
        ]);

        if ((new UserService())->createAndSendActivationCode($user, 'email')) {
            $this->addResponse(trans('auth.verification_code_sent'));
            $this->addStatusCode(201);
            return $this->response();
        }


        throw new ApiException(trans('email.verified'), 400);
    }
}

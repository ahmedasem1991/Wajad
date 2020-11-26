<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Services\UserService;

/**
 * @group Auth
 */
class SendResetPasswordController extends Controller
{
    private $types = [
        'phone',
        'email'
    ];

    /**
     * Send Code
     * @urlParam type required phone or email. Example:phone.
     * @bodyParam token Barier-token required
     * @response
     * {
     *"success": true,
     *"message": "Verification code sent.",
     *"status_code": 200
     *}
     * @return void
     */
    public function __invoke($user)
    {

        



        if (is_numeric($user)) {
            $user=$user;
            $user = ltrim($user, '+966');
            $user = ltrim($user, '966');
            $user = ltrim($user, '0');
        }

        $check_user=  User::normalusers()
        ->where('email' , $user)
        ->orWhere('mobile_number', $user)
        ->first()  ; 


        if (! $check_user) {
            throw new ApiException('User Not Found!', 400);
        }

        if ((new UserService)->createAndSendResetPassword(auth('api')->user(), $type)) {

            $this->addStatusCode(201);

            $this->addResponse(trans('auth.verification_code_sent'));

            return $this->response();
        }

        throw new ApiException(trans('auth.something_wrong'), 400);
    }
}

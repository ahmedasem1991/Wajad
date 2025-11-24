<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Services\UserService;

/**
 * @group Auth
 */
class SendCodeController extends Controller
{
    private $types = [
        'phone',
        'email',
    ];

    /**
     * Send Code
     *
     * @urlParam type required phone or email. Example:phone.
     *
     * @bodyParam token Barier-token required
     *
     * @response
     * {
     *"success": true,
     *"message": "Verification code sent.",
     *"status_code": 200
     *}
     *
     * @return void
     */
    public function __invoke($type)
    {
        if (! in_array($type, $this->types)) {
            throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.page')]), 400);
        }

        if ((new UserService)->createAndSendActivationCode(auth('api')->user(), $type)) {

            $this->addStatusCode(201);

            $this->addResponse(trans('auth.verification_code_sent'));

            return $this->response();
        }

        throw new ApiException(trans('auth.something_wrong'), 400);
    }
}

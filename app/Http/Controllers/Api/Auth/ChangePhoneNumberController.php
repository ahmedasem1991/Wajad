<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\Api\ApiException;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Validation\Validator;

/**
 * @group User Profile
 */
class ChangePhoneNumberController extends Controller
{
    public function __invoke()
    {
        $user = auth('api')->user();

        $validate_request = Validator::make(request()->all(), [
            'mobile_number' => ['required', 'numeric', 'digits_between:9,14', Rule::unique('users')->ignore($user->id)],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        if (!preg_match('/(00966)[0-9]{9}/', request('mobile_number'))) {
            $mobile_number = '00966' . request('mobile_number');
        }

        $user->update([
            'mobile_number' => $mobile_number,
            'is_mobile_number_verified' => false
        ]);

        if ((new UserService)->createAndSendActivationCode($user, 'mobile_number')) {
            $this->addResponse(trans('auth.verification_code_sent'))->addStatusCode(201);

            return $this->response();
        }

        throw new ApiException(trans('auth.something_wrong'), 400);
    }
}

<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\Api\ApiException;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;

/**
 * @group User Profile
 */
class ChangePhoneNumberController extends Controller
{
    /**
     * Change Phone Number
     * @bodyParam mobile_number numeric required digits_between:9,14 unique:user ignore:user-id
     * @bodyParam mobile_country_id numeric exists:countries,id
     * @bodyParam token Barier-token required
     * @response {
     *  "success": true,
     *  "message": "Verification code sent.",
     *  "status_code": 200
     *}
     */
    public function __invoke()
    {
        $user = auth('api')->user();

        request()->merge([
            'mobile_number' => ltrim((string) request('mobile_number'), 0)
        ]);

        $validate_request = Validator::make(request()->all(), [
            'mobile_number' => ['required', 'numeric', 'digits_between:9,14', Rule::unique('users')->ignore($user->id)],
            'mobile_country_id' => ['required', 'int', 'exists:countries,id'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }


        session()->put('v_mobile_number', request('mobile_number'));
        session()->put('v_mobile_country_id',request('mobile_country_id'));
        $user->update([
           // 'mobile_number' => request('mobile_number'),
           // 'mobile_country_id' => request('mobile_country_id'),
            'is_mobile_number_verified' => false
        ]);

        if ((new UserService)->createAndSendActivationCode($user, 'phone')) {
            $this->addResponse(trans('auth.verification_code_sent'))->addStatusCode(200);

            return $this->response();
        }

        throw new ApiException(trans('auth.something_wrong'), 400);
    }
}

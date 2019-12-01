<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\Api\ApiException;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Services\SmsProvider;
use App\Services\UserService;

class UserController extends Controller
{
    protected $smsProvider;

    public function __construct(SmsProvider $smsProvider)
    {
        $this->smsProvider = $smsProvider;
    }

    public function updateUserProfile(Request $request)
    {
        $user = auth('api')->user();

        $validate_request = Validator::make($request->all(), [
            'name' => ['required', 'min:6', 'max:255'],
            'receive_emails' => ['required', 'boolean'],
            'receive_push_notifications' => ['required', 'boolean'],
            'default_distance_unit' => ['required', 'string', 'in:kilo,mile']
        ]);

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(400);
            return $this->response();
        }

        $user->update([
            'name' => $request->name,
            'receive_emails' => $request->receive_emails,
            'receive_push_notifications' => $request->receive_push_notifications,
            'default_distance_unit' => $request->default_distance_unit,
        ]);

        $this->addResponse(trans('user.updated'))->addStatusCode(201);

        return $this->response();
    }

    public function changeEmail(Request $request)
    {
        $user = auth('api')->user();

        $validate_request = Validator::make($request->all(), [
            'email' => ['required', 'email', Rule::unique('users,email')->ignore($user->id)],
        ]);

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(400);
            return $this->response();
        }

        $user = User::find($user->id);

        $user->update([
            'email_verified_at' => null,
            'email' => $request->email
        ]);

        # STILL NEED TAREK PART OF EMAIL VERIFICATION

        # STILL NEED TAREK PART OF EMAIL VERIFICATION

        $this->addStatusCode(200);

        $this->addResponse(trans('auth.verification_code_sent'));

        return $this->response();
    }

    public function changePhoneNumber(Request $request)
    {
        $user = auth('api')->user();

        $validate_request = Validator::make($request->all(), [
            'mobile_number' => ['required', 'numeric', Rule::unique('users,mobile_number')->ignore($user->id), 'min:9', 'max:14'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first());
        }

        $user = User::find($user->id);

        $user->update([
            'is_mobile_number_verified' => false,
            'mobile_number' => $request->mobile_number
        ]);

        if (app()->environment('production')) {
            if (!preg_match('/(00966)[0-9]{9}/', $request->mobile_number)) {
                $request->merge([
                    'mobile_number' => '00966' . $request->mobile_number
                ]);
            }
        }

        $activation_code = env('STATIC_VERIFICATION_CODE', rand(1000, 9999));

        $user->userVerification()->create([
            'verification_code' => $activation_code
        ]);

        $message = 'Wajad, Register activation code is ' . $activation_code;

        $this->smsProvider->sendMessage($message, $request->mobile_number);

        $this->addStatusCode(200);

        $this->addResponse(trans('auth.verification_code_sent'));

        return $this->response();
    }
}

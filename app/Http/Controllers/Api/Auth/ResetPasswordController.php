<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use App\Services\SmsProvider;
use App\Mail\ResetPasswordMail;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordRequestMail;
use Illuminate\Support\Facades\Validator;

/**
 * @group User Profile
 */
class ResetPasswordController extends Controller
{
    /**
     * User Password Reset
     * @bodyParam email:exist:verified || mobile_number
     * @response
     * {
     *
     * }
     */
    public function __invoke()
    {
        if (filter_var(request('user'), FILTER_VALIDATE_EMAIL)) {
            $user_validation = ['required', 'email', 'exists:users,email'];

            $user_identifier = 'email';
        }

        if (is_numeric(request('user'))) {
            $user_validation = ['user' => ['required', 'min:9', 'max:14', 'exists:users,mobile_number']];

            $user_identifier = 'mobile_number';
        }

        $validate_request = Validator::make(
            request()->all(),
            ['user' => $user_validation],
            ['user.exists' => trans('auth.notvalid')]
        );

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        $user = User::where($user_identifier, '=', request('user'))
            ->where('type', '=', User::Types['user'])
            ->first();

        $new_password = env('STATIC_NEW_PASSWORD', \Str::upper(\Str::random(6)));

        if (filter_var(request('user'), FILTER_VALIDATE_EMAIL)) {
            if (!$user->isEmailVerified()) {
                throw new ApiException(trans('auth.mail_not_verified'), 400);
            }

            Mail::to(request('user'))->send(new ResetPasswordMail($new_password));

            $this->addResponse(trans('auth.new_password_sent_to_mail'))->addStatusCode(200);
        }

        if (is_numeric(request('user'))) {
            $message = trans('auth.new_password') . $new_password;

            (new SmsProvider)->sendMessage($message, request('user'));

            Mail::to($user->email)->send(new ResetPasswordRequestMail());

            $this->addResponse(trans('auth.new_password_sent_to_phone'))->addStatusCode(200);
        }

        $user->update([
            'password' => bcrypt($new_password),
        ]);

        return $this->response();
    }
}

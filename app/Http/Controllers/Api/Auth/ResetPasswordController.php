<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use App\Events\SendSMSEvent;
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
     *Forget Password
     * @bodyParam user email,min:9,max:14 required email or phone. Example:mail@gmail.com
     * @response
     * {
     *"success": true,
     *"message": "New password sent successfully to your mail.",
     *"status_code": 200
     *}
     * @return void
     */
    public function __invoke()
    {
        if (filter_var(request('user'), FILTER_VALIDATE_EMAIL)) {
            $user_validation = ['required', 'email', 'exists:users,email'];

            $user_identifier = 'email';
        }

        if (is_numeric(request('user'))) {
//            request()->merge(['user'=>ltrim(request('user'), 0)]);
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

        if (!$user) {
            throw new ApiException(trans('messages.not_found', ['model' => trans('messages.attributes.user')]), 400);
        }

        $new_password = env('STATIC_NEW_PASSWORD', \Str::upper(\Str::random(6)));

        if (filter_var(request('user'), FILTER_VALIDATE_EMAIL)) {
            if (!$user->isEmailVerified()) {
                throw new ApiException(trans('auth.mail_not_verified'), 400);
            }

            Mail::to(request('user'))->send(new ResetPasswordMail($new_password));
          // Mail::to($user->email)->send(new ResetPasswordRequestMail());
            $this->addResponse(trans('auth.new_password_sent_to_mail'))->addStatusCode(200);
        }

        if (is_numeric(request('user'))) {
            $message = trans('auth.new_password') . $new_password;
           // new SendSMSEvent( $user->country->country_code. $user->mobile_number,$message);
           Unifonic::send($user->country->country_code. $user->mobile_number, $message, 'WAJAD');

          // (new SmsProvider)->sendMessage($message, $user->country->country_code. $user->mobile_number);

            Mail::to($user->email)->send(new ResetPasswordRequestMail());

            $this->addResponse(trans('auth.new_password_sent_to_phone'))->addStatusCode(200);
        }

        $user->update([
            'password' => bcrypt($new_password),
        ]);

        return $this->response();
    }
}

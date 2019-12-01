<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\Api\ApiException;
use App\Services\SmsProvider;
use App\Mail\ResetPasswordMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordRequestMail;

class ResetPasswordController extends Controller
{
    protected $smsProvider;

    public function __construct(SmsProvider $smsProvider)
    {
        $this->smsProvider = $smsProvider;
    }

    public function __invoke()
    {
        $new_password = env('STATIC_NEW_PASSWORD', \Str::upper(\Str::random(6)));

        if (is_numeric(request('user'))) {

            $validate_mobile_number = Validator::make(
                request()->all(),
                ['user' => ['required', 'min:9', 'max:14', 'exists:users,mobile_number']],
                ['user.exists' => trans('auth.notvalid')]
            );

            if ($validate_mobile_number->fails()) {
                throw new ApiException($validate_mobile_number->errors()->first());
            }

            if (app()->environment('production')) {
                if (!preg_match('/(00966)[0-9]{9}/', request('user'))) {
                    request()->merge(['user' => '00966' . request('user')]);
                }
            }

            $message = trans('auth.new_password') . $new_password;

            $this->smsProvider->sendMessage($message, request('user'));

            $user = User::where('mobile_number', '=', request('user'))
                ->where('type', '=', User::Types['user'])
                ->first();

            $user->update([
                'password' => bcrypt($new_password),
            ]);

            Mail::to($user->email)->send(new ResetPasswordRequestMail());

            $this->addResponse(trans('auth.new_password_sent_to_phone'))->addStatusCode(200);

            return $this->response();
        }

        if (filter_var(request('user'), FILTER_VALIDATE_EMAIL)) {
            $validate_email = Validator::make(
                request()->all(),
                ['user' => ['required', 'email', 'exists:users,email']],
                ['user.exists' => trans('auth.notvalid')]
            );

            if ($validate_email->fails()) {
                throw new ApiException($validate_email->errors()->first());
            }

            $user = User::where('email', '=', request('user'))
                ->where('type', '=', User::Types['user'])
                ->first();

            if ($user->isEmailVerified()) {

                $user->update([
                    'password' => bcrypt($new_password),
                ]);

                Mail::to(request('user'))->send(new ResetPasswordMail($new_password));

                $this->addResponse(trans('auth.new_password_sent_to_mail'))->addStatusCode(200);

                return $this->response();
            }

            throw new ApiException(trans('auth.mail_not_verified'));
        }
    }
}

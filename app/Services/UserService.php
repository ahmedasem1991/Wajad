<?php

namespace App\Services;

use App\User;
use App\Country;
use App\UserVerifications;
use App\Events\SendSMSEvent;
use App\Services\SmsProvider;
use App\Mail\EmailVerificationCode;
use App\Exceptions\Api\ApiException;
use Illuminate\Support\Facades\Mail;

class UserService
{
    /**
     * Veriify Code For User
     *
     * @param User $user
     * @param Integer $code
     * @return void
     */
    public function verifyActivationCode(User $user, $code, $code_valid_for)
    {

        $user_verificatioin =  $user->userVerification ?? null;

        if ($user_verificatioin->expire_at < now()){
            throw new ApiException(trans('auth.verification_code_expired'),400);
        }

        if (!$user_verificatioin) {
            throw new ApiException(trans('auth.something_wrong'), 400);
        }

        if ($user_verificatioin->verification_code !== (int) $code) {
            $user_verificatioin->increment('attempt');
            throw new ApiException(trans('auth.wrong_code'), 400);
        }

        if ($user_verificatioin->attempt >= 3) {
            throw new ApiException(trans('auth.verification_code_exceeded'), 400);
        }

        if ($code_valid_for == 'phone') {
            if (!$user_verificatioin->codeValidForMobileNumber()) {
                $user_verificatioin->increment('attempt');
                throw new ApiException(trans('auth.wrong_code'), 400);
            }
          $mobile_number=  $user->mobile_number;
          $mobile_country_id=  $user->mobile_country_id;
          $v_mobile_number=  $user->v_mobile_number;
          $v_mobile_country_id=  $user->v_mobile_country_id;

        $user->update([
            'mobile_number' =>$v_mobile_number ?? $mobile_number,
            'mobile_country_id' => $v_mobile_country_id ??$mobile_country_id,
            'is_mobile_number_verified' => true
        ]);

            $user->userVerification()->delete();
        }

        if ($code_valid_for == 'email') {
            if (!$user_verificatioin->codeValidForEmail()) {
                $user_verificatioin->increment('attempt');

                throw new ApiException(trans('auth.wrong_code'), 400);
            }

            $user->update([
                'email_verified_at' => now()
            ]);

            $user->userVerification()->delete();
        }
    }

    /**
     * Create And Send Activation Code For User
     *
     * @param User $user
     * @param String[phone|email] $code_valid_for
     * @return void
     */
    public function createAndSendActivationCode(User $user, string $code_valid_for)
    {
        if ($user->userVerification && $user->userVerification->sendCodeWithinMinute()) {
            throw new ApiException(trans('auth.verification_code_wait_time_one_minute'), 400);
        }

        $user->userVerification()->delete();

        $activation_code = random_int(1000, 9999);
//        $activation_code = env('STATIC_VERIFICATION_CODE', rand(1000, 9999));

        $user->userVerification()->create([
            'verification_code' => $activation_code,
            'code_valid_for' => $code_valid_for
        ]);

        if ($code_valid_for == 'phone') {
            $message = 'Wajad, Register activation code is ' . $activation_code;


            if($user->country->country_code==="966" || $user->country->country_code==="+966"){
                \Unifonic::send($user->country->country_code. $user->mobile_number, $message, 'WAJAD');
                // new SendSMSEvent( $user->country->country_code. $user->mobile_number,$message);
            }
            else{
                // (new SmsProvider)->sendMessage($message, $user->country->country_code. $user->mobile_number);
            }
            return true;
        }

        if ($code_valid_for == 'email') {
            Mail::to($user)->send(new EmailVerificationCode($activation_code));

            return true;
        }

        return false;
    }



        /**
     * Create And Send Activation Code For User
     *
     * @param User $user
     * @param String[phone|email] $code_valid_for
     * @return void
     */
    public function createAndSendActivationCodeForUpdateMobile(User $user)
    {

        if ($user->userVerification && $user->userVerification->sendCodeWithinMinute()) {
            throw new ApiException(trans('auth.verification_code_wait_time_one_minute'), 400);
        }

        $user->userVerification()->delete();

        $verification_code = random_int(1000, 9999);
//        $verification_code = env('STATIC_VERIFICATION_CODE', rand(1000, 9999));

        $user->userVerification()->create([
            'verification_code' => $verification_code,
            'code_valid_for' => 'phone'
        ]);



            $message = 'Wajad,  verification  code is ' . $verification_code;

          //  dd($user->v_mobile_country_id);
            $country_code=Country::find($user->v_mobile_country_id)['country_code'];

                 Unifonic::send($country_code. $user->v_mobile_number,$message, 'WAJAD');
                // new SendSMSEvent( $user->country->country_code. $user->mobile_number,$message);

            return true;





    }



        /**
     * Create And Send Activation Code For User
     *
     * @param User $user
     * @param String[phone|email] $code_valid_for
     * @return void
     */
    public function createAndSendResetPassword(User $user)
    {
        if ($user->userVerification && $user->userVerification->sendCodeWithinMinute()) {
            throw new ApiException(trans('auth.verification_code_wait_time_one_minute'), 400);
        }

        $user->userVerification()->delete();

        $activation_code = random_int(1000, 9999);
//        $activation_code = env('STATIC_VERIFICATION_CODE', rand(1000, 9999));

        $user->userVerification()->create([
            'verification_code' => $activation_code,
            'code_valid_for' => 'phone'
        ]);


            $message = 'Wajad,  Activation code is ' . $activation_code;
            if($user->country->country_code==="966" || $user->country->country_code==="+966"){
                Unifonic::send($user->country->country_code. $user->mobile_number, $message, 'WAJAD');
                // new SendSMSEvent( $user->country->country_code. $user->mobile_number,$message);
            }
            Mail::to($user)->send(new EmailVerificationCode($activation_code));

            return true;



    }




        /**
     * Verify Password For User
     *
     * @param User $user
     * @param Integer $code
     * @return void
     */
    public function verifyActivationPassword(User $user, $code)
    {
        $user_verificatioin =  $user->userVerification ?? null;

        if (!$user_verificatioin) {
            throw new ApiException(trans('auth.something_wrong'), 400);
        }

        if ($user_verificatioin->verification_code !== (int) $code) {
            $user_verificatioin->increment('attempt');
            throw new ApiException(trans('auth.wrong_code'), 400);
        }

        if ($user_verificatioin->attempt >= 3) {
            throw new ApiException(trans('auth.verification_code_exceeded'), 400);
        }


            if (!$user_verificatioin->codeValidForMobileNumber()) {
                $user_verificatioin->increment('attempt');
                throw new ApiException(trans('auth.wrong_code'), 400);
            }

            if ($user_verificatioin->expire_at < now()){
                throw new ApiException(trans('auth.verification_code_expired'),400);
            }


            $user->userVerification()->delete();

    }
}

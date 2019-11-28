<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\User;
use App\UserVerifications;
use App\Services\SmsProvider;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class VerificationController extends Controller
{
    protected $smsProvider;

    public function __construct(SmsProvider $smsProvider)
    {
        $this->middleware('auth:api');
        $this->smsProvider = $smsProvider;
    }

    public function sendEmailVerification(Request $request)
    {
        $user = $request->user();
        if ($user->hasVerifiedEmail()) {
            $this->addResponse(trans('email.verified'))->addStatusCode(422);
            return $this->response();
        }
        $activation_code = env('STATIC_VERIFICATION_CODE', rand(1000, 9999));

        $verification = UserVerifications::firstOrNew(['user_id' => $user->id]);

        $verification->user_id = $user->id;

        $verification->verification_code = $activation_code;

        $verification->save();

        // Needs Revision

        Mail::send('emails.reset_password_request', [$activation_code], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($user->email)->subject('Email Verification Code');
        });

        $this->addResponse(trans('email.sent'))->addStatusCode(201);

        return $this->response();
    }

    public function verifyEmail(Request $request)
    {
        $user = $request->user();
        $validation = UserVerifications::where('user_id', $user->id)->get();
        $validate_request = Validator::make(request()->all(), [
            'code' => ['required|digits:4'],
        ]);
        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(400);
            return $this->response();
        }
        if ($request->code !== $validation->verification_code){
            $validation->attemp++;
            $validation->save();
            $this->addResponse('Code Does Not Match')->addStatusCode(400);
            return $this->response();
        }else{
            $user->email_verified_at = now();
            $user->save();
            $validation->delete();
            $this->addResponse(trans('email.verified'))->addStatusCode(201);

            return $this->response();
        }
    }
}

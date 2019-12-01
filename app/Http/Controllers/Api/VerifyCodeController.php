<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;

class VerifyCodeController extends Controller
{
    private $verification_types = [
        'phone', 'email'
    ];

    public function __invoke(Request $request, $type)
    {
        $user = User::find(auth('api')->user());

        (new UserService)->verifyActivationCode($user, $request->code);

        if (!in_array($type, $this->verification_types)) {
            throw new ApiException("", 404);
        }

        if ($type == 'phone') {
            $user->update([
                'is_mobile_number_verified' => true
            ]);
        }

        if ($type == 'email') {
            $user->update([
                'email_verified_at' => now()
            ]);
        }

        $this->addStatusCode(200);

        $this->addResponse(trans("verified_successfully", ['Type' => \Str::title($type)]));

        return $this->response();
    }
}

<?php

namespace App\Http\Controllers\Api\Auth;


use Illuminate\Http\Request;
use App\Services\UserService;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VerifyPhoneOrEmailController extends Controller
{
    private $verification_types = [
        'phone', 'email'
    ];

    /**
     * Verify Phone or Email
     * @urlParam type required phone or email. Example:phone.
     * @bodyParam code digits:4,numeric required . Example:1234
     * @response {
     *         "success": true,
     *         "message": "Phone Verified Successfully",
     *         "status_code": 200
     * }
     * @return void
     */
    public function __invoke(Request $request, $type)
    {
        $user = auth('api')->user();

        $validate_for_code = Validator::make($request->all(), [
            'code' => ['required', 'numeric', 'digits:4']
        ]);

        if ($validate_for_code->fails()) {
            throw new ApiException($validate_for_code->errors()->first(), 400);
        }

        if (!in_array($type, $this->verification_types)) {
            throw new ApiException(trans('auth.failed'), 404);
        }

        (new UserService)->verifyActivationCode($user, $request->code, $type);

        $this->addStatusCode(200);

        $this->addResponse(trans("auth.verified_successfully", ['Type' => \Str::title($type)]));

        return $this->response();
    }
}

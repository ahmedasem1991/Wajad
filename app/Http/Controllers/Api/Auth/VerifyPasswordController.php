<?php

namespace App\Http\Controllers\Api\Auth;


use App\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

/**
 * @group User Profile
 */
class VerifyPasswordController extends Controller
{
    private $verification_types = [
        'phone',
        'email'
    ];

    /**
     * Verify Password Code 
     * @bodyParam code numeric required digits:4 Example:1234
     * @bodyParam user_id numeric required 
     * @response {
     *         "success": true,
     *         "message": "Password is verified Successfully!",
     *         "status_code": 200
     * }
     * @return void
     */
    public function __invoke(Request $request)
    {
       

        $validate_for_code = Validator::make($request->all(), [
            'code' => ['required', 'numeric', 'digits:4'],
            'user_id' => ['required', 'exists:users,id']
        ]);
  

        if ($validate_for_code->fails()) {
            throw new ApiException($validate_for_code->errors()->first(), 400);
        }
        $user = User::find($request->user_id);
      //  dd($user);

        (new UserService)->verifyActivationPassword($user, $request->code);

        $this->addStatusCode(200);

        $this->addResponse('Password is verified Successfully!');

        return $this->response();
    }
}

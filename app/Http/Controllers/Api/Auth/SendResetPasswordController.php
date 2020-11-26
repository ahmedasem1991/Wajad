<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;

/**
 * @group User Profile
 */
class SendResetPasswordController extends Controller
{
    private $types = [
        'phone',
        'email'
    ];

    /**
     * New Send Reset Password
     * @bodyParam user string Email or Phone
     * @response
     * {
     *"success": true,
     *"message": "Verification code sent.",
     *"status_code": 200
     *}
     * @return void
     */
    public function __invoke(Request $request)
    {

        
        $user=$request->user;


        if (is_numeric($user)) {
            $user=$user;
            $user = ltrim($user, '+966');
            $user = ltrim($user, '966');
            $user = ltrim($user, '0');
        }

        $check_user=  User::normalusers()
        ->where('email' , $user)
        ->orWhere('mobile_number', $user)
        ->first()  ; 


        if (! $check_user) {
            throw new ApiException('User Not Found!', 400);
        }

        if ((new UserService)->createAndSendResetPassword($check_user)) {

            $data=[
                "success"=> true,
                "message"=> "Verification code sent.",
                "user_id"=> $check_user->id,
                "status_code"=> 200
            ];
            return $data;
            // $this->addStatusCode(201);


            // $this->addResponse(trans('auth.verification_code_sent'));
            // //$this->addResponse(['user_id'=> $check_user->id]);

            // return $this->response();
        }

        throw new ApiException(trans('auth.something_wrong'), 400);
    }
}

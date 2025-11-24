<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;

/**
 * @group User Profile
 */
class NewChangePasswordController extends Controller
{
    /**
     *New Change Password
     *
     * @bodyParam user_id integer required
     * @bodyParam new_password string required 'confirmed' 'min:6', 'max:255'
     * @bodyParam new_password_confirmation string required confirm new password
     *
     * @response {
     *  "success": true,
     *  "message": "Password Updated Successfully",
     *  "status_code": 200
     *}
     */
    public function __invoke()
    {
        $validate_request = Validator::make(request()->all(), [
            'user_id' => ['required', 'exists:users,id'],
            'new_password' => ['required', 'confirmed', 'min:6', 'max:255'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }
        $User = User::find(request('user_id'));

        $User->update([
            'password' => bcrypt(request('new_password')),
        ]);

        $this->addResponse(trans('passwords.updated'))->addStatusCode(201);

        return $this->response();
    }
}

<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $validate_request = Validator::make(request()->all(), [
            'old_password' => ['required', 'min:6', 'max:255'],
            'new_password' => ['required', 'confirmed', 'min:6', 'max:255'],
        ]);

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(401);
            return $this->response();
        }

        if (!Hash::check(request('old_password'), auth('api')->user()->getAuthPassword())) {
            $this->addResponse(trans('passwords.invalid'))->addStatusCode(401);
            return $this->response();
        }

        auth('api')->user()->update([
            'password' => bcrypt(request('new_password'))
        ]);

        $this->addResponse(trans('passwords.updated'))->addStatusCode(201);

        return $this->response();
    }
}

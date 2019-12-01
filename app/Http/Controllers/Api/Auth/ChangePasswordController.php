<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\Api\ApiException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function __invoke()
    {
        $validate_request = Validator::make(request()->all(), [
            'old_password' => ['required', 'min:6', 'max:255'],
            'new_password' => ['required', 'confirmed', 'min:6', 'max:255'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first());
        }

        if (!Hash::check(request('old_password'), auth('api')->user()->getAuthPassword())) {
            throw new ApiException(trans('passwords.invalid'));
        }

        auth('api')->user()->update([
            'password' => bcrypt(request('new_password'))
        ]);

        $this->addResponse(trans('passwords.updated'))->addStatusCode(201);

        return $this->response();
    }
}

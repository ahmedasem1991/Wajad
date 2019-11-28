<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function updateUserProfile(Request $request)
    {
        $user = auth('api')->user();

        $validate_request = Validator::make($request->all(), [
            'name' => ['required', 'min:6', 'max:255'],
            'receive_emails' => ['required', 'boolean'],
            'receive_push_notifications' => ['required', 'boolean'],
            'default_distance_unit' => ['required', 'string', 'in:kilo,mile']
        ]);

        if ($validate_request->fails()) {
            $this->addMultibleResponse($validate_request->errors())->addStatusCode(400);
            return $this->response();
        }

        $user->update([
            'name' => $request->name,
            'receive_emails' => $request->receive_emails,
            'receive_push_notifications' => $request->receive_push_notifications,
            'default_distance_unit' => $request->default_distance_unit,
        ]);

        $this->addResponse(trans('user.updated'))->addStatusCode(201);

        return $this->response();
    }
}

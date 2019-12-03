<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Services\SmsProvider;
use App\Services\UserService;
use Illuminate\Validation\Rule;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UpdateUserProfileController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = auth('api')->user();

        $validate_request = Validator::make($request->all(), [
            'name' => ['required', 'min:6', 'max:255'],
            'receive_emails' => ['required', 'boolean'],
            'receive_push_notifications' => ['required', 'boolean'],
            'default_distance_unit' => ['required', 'string', 'in:kilo,mile']
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        $user->update([
            'name' => $request->name,
            'receive_emails' => $request->receive_emails,
            'receive_push_notifications' => $request->receive_push_notifications,
            'default_distance_unit' => $request->default_distance_unit,
        ]);

        $this->addResponse(trans('messages.updated', ['model' => trans('messages.attributes.user')]))->addStatusCode(201);

        return $this->response();
    }
}

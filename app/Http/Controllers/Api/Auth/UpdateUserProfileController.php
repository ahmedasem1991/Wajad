<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Services\SmsProvider;
use App\Services\UserService;
use Illuminate\Validation\Rule;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

/**
 * @group User Profile
 */
class UpdateUserProfileController extends Controller
{
    /**
     *Update User Profile
     * @bodyParam name string required min:6,max:255 1 or 0. Example:1234
     * @bodyParam receive_emails boolean required 1 or 0. Example:1
     * @bodyParam receive_push_notifications boolean required 1 or 0. Example:1
     * @bodyParam default_distance_unit string,in:kilo,mile required kilo or mile. Example:mile
     * @bodyParam image file mimes:jpeg,jpg,png,gif, max:5102
     * @response
     * {
     *"success": true,
     *"message": "User updated successfully.",
     *"status_code": 200
     *}
     * @return void
     */
    public function __invoke(Request $request)
    {
        $user = auth('api')->user();

        $validate_request = Validator::make($request->all(), [
            'name' => ['required', 'min:6', 'max:255'],
            'receive_emails' => ['required', 'boolean'],
            'receive_push_notifications' => ['required', 'boolean'],
            'default_distance_unit' => ['required', 'string', 'in:kilo,mile'],
            'image' => ['sometimes', 'mimes:jpeg,jpg,png,gif', 'max:5102'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        if ($request->receive_emails && !$user->isEmailVerified()) {
            throw new ApiException(trans('auth.cannot_recieve_emails'), 400);
        }

        $user->update([
            'name' => $request->name,
            'receive_emails' => $request->receive_emails,
            'receive_push_notifications' => $request->receive_push_notifications,
            'default_distance_unit' => $request->default_distance_unit,
        ]);

        if ($request->has('image')) {
            Storage::disk('public')->delete($user->image);

            $user->update([
                'image' => $request->file('image')->store('images/profile')
            ]);
        }

        $this->addResponse(trans('messages.updated', ['model' => trans('messages.attributes.user')]))->addStatusCode(201);

        return $this->response();
    }
}

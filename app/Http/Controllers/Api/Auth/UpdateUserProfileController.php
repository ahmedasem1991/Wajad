<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Services\SmsProvider;
use App\Services\UserService;
use Illuminate\Validation\Rule;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Rules\BooleanAttribute;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * @group User Profile
 */
class UpdateUserProfileController extends Controller
{
    /**
     *Update User Profile
     * @bodyParam name string required min:6,max:255
     * @bodyParam receive_emails boolean required in:true,false,0,1. Example:1
     * @bodyParam receive_push_notifications boolean required in:true,false,0,1. Example:1
     * @bodyParam default_distance_unit string,in:kilo,mile required kilo or mile. Example:mile
     * @bodyParam image file mimes:jpeg,jpg,png,gif, max:5102
     * @bodyParam email  string required unique 
     * @bodyParam token Barier-token required
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
            'image' => ['sometimes', 'base64dimensions:min_width=100,min_height=200'],
            'email' => ['required', 'email:rfc,dns','unique:users,email,'. $user->id.',id,type,1,deleted_at,NULL'],
        ]);

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        if ($request->receive_emails && !$user->isEmailVerified()) {
            throw new ApiException(trans('auth.cannot_recieve_emails'), 400);
        }

        $user->update([
            'name' => $request->name,
            'receive_emails' => (bool) $request->receive_emails,
            'receive_push_notifications' => (bool) $request->receive_push_notifications,
            'default_distance_unit' => $request->default_distance_unit,
            'email' => $request->email,
        ]);
        if($request->email !=$user->email )
        $user->email_verified_at=NULL;
        $user->save();

        if ($request->has('image') && $request->image !== '' && !is_null($request->image)) {

            if ($user->image != '/images/profile/default-profile.png') {
                Storage::disk('public')->delete($user->image);
            }
            $image_name = \Str::random(15) . '.' . 'png';
            $path = public_path('/images/profile/' . $image_name);
            Image::make(file_get_contents($request->image))->save($path);

            $user->update([
                'image' =>   '/images/profile/' . $image_name
            ]);
        }

        $this->addResponse(trans('messages.updated', ['model' => trans('messages.attributes.user')]))->addStatusCode(201);

        return $this->response();
    }
}

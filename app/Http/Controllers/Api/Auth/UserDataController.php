<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

/**
 * @group User Profile
 */
class UserDataController extends Controller
{

    /**
     * User Data
     * @response {
     *  "data": {
     *     "id": 2,
     *    "name": "User",
     *   "email": "user@nova.com",
     *  "status": 1,
     * "mobile_number": "01142416124",
     *"receive_emails": false,
     *"receive_push_notifications": false,
     *"is_email_verified": false,
     *"is_mobile_number_verified": false,
     *"default_distance_unit": "kilo",
     *"image": "image.png"
     *}
     *}
     * @return void
     */
    public function __invoke()
    {
        return new UserResource(auth('api')->user());
    }
}

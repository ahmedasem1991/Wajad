<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @group User Profile
 */
class QuickUserController extends Controller
{
    /**
     * User QuickBlox Credentials
     * @response
     * {
     *      "name": "name",
     *      "email": "email",
     *      "quick_user_id": "123456789",
     *      "quick_user_password": "password"
     * }
     *
     * @return \Illuminate\Support\Collection
     */
    public function __invoke(Request $request)
    {
        $user = auth('api')->user();
        return collect([
            'name' => $user->name,
            'email' => $user->email,
            'quick_user_id' => $user->quick_user_id,
            'quick_user_password' => $user->quick_user_password
        ]);
    }
}

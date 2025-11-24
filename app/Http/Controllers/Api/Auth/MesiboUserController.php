<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group User Profile
 */
class MesiboUserController extends Controller
{
    /**
     * User Mesibo Credentials
     *
     * @bodyParam token Barier-token required
     *
     * @response
     * {
     *      "name": "name",
     *      "email": "email",
     *      "mesibo_uid": mesibo_uid,
     *      "mesibo_token" :  mesibo_token,
     *      "mesibo_address" :  mesibo_address,
     * }
     *
     * @return void
     */
    public function __invoke(Request $request)
    {
        $user = auth('api')->user();

        return collect([
            'name' => $user->name,
            'email' => $user->email,
            'mesibo_uid' => $user->mesibo_uid,
            'mesibo_token' => $user->mesibo_token,
            'mesibo_address' => $user->mesibo_address,
        ]);
    }
}

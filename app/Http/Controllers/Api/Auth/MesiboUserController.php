<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @group User Profile
 */
class MesiboUserController extends Controller
{
    /**
     * User Mesibo Credentials
     * @bodyParam token Barier-token required
     * @response
     * {
     *      "name": "name",
     *      "email": "email",
     *      "mesibo_uid": mesibo_uid,
     *      "mesibo_token" :  mesibo_token,
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
            "mesibo_uid" =>  $user->mesibo_uid,
            "mesibo_token" =>  $user->mesibo_token,
        ]);
    }
}

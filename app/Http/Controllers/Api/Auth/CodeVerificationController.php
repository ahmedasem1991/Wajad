<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class CodeVerificationController extends Controller
{
    public function verifyCode(User $user, $code)
    {

    }
}

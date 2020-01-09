<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Nova\Nova;

class UpdatePasswordController extends Controller
{
    public function updatePassword(Request $request)
    {
        $user = $request->user();
        $validator = Validator::make($request->all(), [
            'password' => ['required','min:8','confirmed']
        ])->validate();

        $user->password = Hash::make($request->get('password'));
        $user->first_time_login = 0;
        $user->save();
        return redirect(Nova::path());

    }
}

<?php

namespace App\Http\Requests\Auth;

use App\Exceptions\Api\ApiException;
use Illuminate\Foundation\Http\FormRequest;
use Tintnaingwin\EmailChecker\Rules\EmailExist;
 

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $User=\App\User::where('email',request('user'))
        ->orWhere('mobile_number',request('user'))
        ->where('deleted_at' ,'!=',NULL)->first();
        if( $User)
        {
            return [
                'name' => ['required', 'min:6', 'max:255'],
                'email' => ['required', 'email:rfc,dns'],
                //'required|email|unique:users,email,NULL,id,type,1,deleted_at,NULL',
                'password' => ['required', 'min:6', 'max:255'],
                'mobile_number' => ['required', ],
                'device_type' => ['required', 'string', 'in:android,ios'],
                'mobile_country_id' => ['required', 'int', 'exists:countries,id'],
            ];
        }
        else{
            return [
                'name' => ['required', 'min:6', 'max:255'],
                'email' => ['required', 'email:rfc,dns', 'unique:users,email,NULL,id,type,1,deleted_at,NULL'],
                //'required|email|unique:users,email,NULL,id,type,1,deleted_at,NULL',
                'password' => ['required', 'min:6', 'max:255'],
                'mobile_number' => ['required', 'unique:users,mobile_number'],
                'device_type' => ['required', 'string', 'in:android,ios'],
                'mobile_country_id' => ['required', 'int', 'exists:countries,id'],
            ];
        }
       

    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->any()) {
                throw new ApiException($validator->errors()->first(), 400);
            }
        });
    }
}

<?php

namespace App\Http\Requests\Auth;

use App\Exceptions\Api\ApiException;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:6', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:255'],
            'mobile_number' => ['required', 'numeric', 'unique:users,mobile_number', 'digits_between:9,14'],
            'device_type' => ['required', 'string', 'in:android,ios']
        ];
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

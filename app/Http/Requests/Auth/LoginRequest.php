<?php

namespace App\Http\Requests\Auth;

use App\Exceptions\Api\ApiException;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => ['required', 'max:255', 'min:6']
        ];
    }


    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            if (is_numeric($this->user)) {
                $validate_mobile_number = $this->validate(
                    ['user' => ['required', 'min:9', 'max:14', 'exists:users,mobile_number']],
                    ['user.exists' => trans('auth.failed')]
                );

                if (app()->environment('production')) {
                    if (!preg_match('/(00966)[0-9]{9}/', request('user'))) {
                        $this->merge(['user' => '00966' . request('user')]);
                    }
                }

                $this->merge([
                    'mobile_number' => $this->user,
                    'password' => $this->password
                ]);
            }

            if (filter_var($this->user, FILTER_VALIDATE_EMAIL)) {
                $this->validate(
                    ['user' => ['required', 'email', 'exists:users,email']],
                    ['user.exists' => trans('auth.failed')]
                );

                request()->merge([
                    'email' => $this->user,
                    'password' => $this->password
                ]);
            }
        });
    }
}

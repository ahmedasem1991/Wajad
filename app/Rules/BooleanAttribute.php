<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class BooleanAttribute implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($value && $value !== '') {
            return in_array($value, [
                '1', 1, "true", 'yes', 'on',
                '0', 0, "false", 'no', 'off',
            ]);
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return  trans('messages.boolean_error', ['model' => 'attribute']);
    }
}

<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlphaDashSpaceApos implements Rule
{
    /**
     * Validates for having one or more letters, numbers, letter component
     * marks, space equivalent in any script, apostrophe, underscore or dash.
     */
    public function passes($attribute, $value)
    {
        if (! is_string($value) && ! is_numeric($value)) {
            return false;
        }

        return preg_match('/^[\pL\pN\pM\pZ\'_-]+.?$/u', $value) > 0;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return trans('validation.alpha_dash_space_apos');
    }
}

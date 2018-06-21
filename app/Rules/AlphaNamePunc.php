<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlphaNamePunc implements Rule
{
    /**
     * Validates for groups of one or more letters or numbers (or letter
     * component marks), each optionally terminated by a period and/or a comma,
     * and each separated by a single separator (space equivalent in any script,
     * apostrophe, underscore or dash). The final letter/number group can only
     * optionally be terminated by a period.
     */
    public function passes($attribute, $value)
    {
        if (! is_string($value) && ! is_numeric($value)) {
            return false;
        }

        return preg_match('/^(?:[\pL\pN\pM]+\.?,?[\pZ\'_-])*[\pL\pN\pM]+\.?$/u', $value) > 0;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return trans('validation.alpha_name_punc');
    }
}

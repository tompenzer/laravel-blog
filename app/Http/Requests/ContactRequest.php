<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * We'll allow anyone to make a contact request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'email_from' => ['required', 'email'],
            'message' => 'required',
            'recipient' => 'exists:users,id'
        ];
    }
}

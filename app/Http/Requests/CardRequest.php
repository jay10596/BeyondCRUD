<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $today = date('yyyy/mm/dd');

        return [
            'number' => ['required', 'numeric', 'digits:16'],
            'cvv' => ['required', 'numeric', 'digits:3'],
            'owner' => ['required', 'string'],
            'expiration_date' => ['required', 'date', 'after:2020/12/21']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'number.numeric' => 'Letters are not allowed',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreValidationRequest extends FormRequest
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
        return [
            'photo' => 'mimes:jpeg,jpg,png',
            'email' => 'unique:users|unique:admins',
            'logo'  => 'mimes:jpeg,jpg,png',
            'favicon'  => 'mimes:ico'
        ];
    }

    public function messages()
    {
    return [
    ];
    }
}

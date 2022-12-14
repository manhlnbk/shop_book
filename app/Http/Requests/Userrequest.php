<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Userrequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name must be required',
            'email' => 'email must be required',
            'password' => 'password must be required',
            'password.confirmed' => 'password must be match'
        ];
    }
}

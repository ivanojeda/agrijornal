<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'name' => 'required|max:30',
            'nif' => 'required|min:9|max:9',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'apellido1' => 'required|max:30',
            'apellido2' => 'max:30',
            'telefono' => 'max:15|required'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JornalFormRequest extends FormRequest
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
            'id_user' => 'required',
            'dia' => 'required|date',
            'inicio_jornada' => 'required',
            'fin_jornada' => 'required',
            'precio_hora' => 'required',
            'pagado' => 'required'
        ];
    }
}

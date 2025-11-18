<?php

namespace App\Http\Requests\Programa;

use Illuminate\Foundation\Http\FormRequest;

class createPrograma extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'programa_formacion' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return[
           'programa_formacion.required' => 'El nombre del programa es obligatorio',
           'programa_formacion.string' => 'El campo solo acepta letras' 
        ];
    }
}

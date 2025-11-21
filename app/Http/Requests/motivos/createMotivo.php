<?php

namespace App\Http\Requests\motivos;

use Illuminate\Foundation\Http\FormRequest;

class createMotivo extends FormRequest
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
            'nombre'=> 'required|string|min:3|max:100|unique:motivos,nombre',
        ];
    }

    /**
     * Custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'nombre.required'      => 'El nombre del motivo es obligatorio.',
            'nombre.string'        => 'El nombre del motivo debe ser texto.',
            'nombre.min'           => 'El nombre del motivo debe tener al menos 3 caracteres.',
            'nombre.max'           => 'El nombre del motivo no puede superar los 100 caracteres.',
            'nombre.unique'        => 'El nombre del motivo ya existe.',
        ];
    }
}

<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreaterUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'documento' => 'required|string|unique:users,documento',
            'contrasena' => 'required|string|min:8',
            'estado_id' => 'required|exists:estados,id',
        ];
    }

    public function messages(): array
    {
        return [
            'documento.required' => 'El documento es obligatorio.',
            'documento.unique' => 'El documento ya existe.',
            'contrasena.required' => 'La contraseña es obligatoria.',
            'contrasena.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'estado_id.required' => 'El estado es obligatorio.',
            'estado_id.exists' => 'El estado seleccionado no existe.',
        ];
    }
}

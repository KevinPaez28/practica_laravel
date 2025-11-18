<?php

namespace App\Http\Requests\perfiles;

use Illuminate\Foundation\Http\FormRequest;

class createPerfiles extends FormRequest
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
            'usuario_id' => 'required|numeric|unique:users,id',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'telefono' => 'required|numeric',
            'correo' => 'required|string|unique',
            'ficha_id' => 'required|numeric|unique'
        ];
    }

    public function messages(): array
    {
        return[
           'usuario_id.required' => 'El usuario es obligatorio', 
           'usuario_id.unique' => 'El perfil ya existe', 
           'nombre.required' => 'El nombre es obligatorio', 
           'apellido.required' => 'El apellido es obligatorio', 
           'telefono.required' => 'El telefono es obligatorio', 
           'correo.required' => 'El correo es obligatorio', 
        ];
    }
}

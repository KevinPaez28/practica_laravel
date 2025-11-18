<?php

namespace App\Http\Requests\Ficha;

use Illuminate\Foundation\Http\FormRequest;

class createficha extends FormRequest
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
            'nombre' => 'required',
            'programa_id' => 'required|exists:programa_formacion,id'
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'programa_id.required' => 'El estado es obligatorio.',
        ];
    }
}

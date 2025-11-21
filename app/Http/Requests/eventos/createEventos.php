<?php

namespace App\Http\Requests\eventos;

use Illuminate\Foundation\Http\FormRequest;

class createEventos extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'nombre'    => 'required|string|min:3|max:100',
            'encargado' => 'required|string|min:3|max:100',
            'sala_id'   => 'required|numeric|exists:salas,id',
            'fecha'     => 'required|date',
            'estado_id' => 'required',
        ];
    }

    /**
     * Custom messages for validation errors
     */
    public function messages(): array
    {
        return [
            'nombre.required'    => 'El nombre del evento es obligatorio.',
            'nombre.string'      => 'El nombre debe ser texto.',
            'nombre.min'         => 'El nombre debe tener al menos 3 caracteres.',
            'nombre.max'         => 'El nombre no puede superar los 100 caracteres.',

            'encargado.required' => 'El encargado es obligatorio.',
            'encargado.string'   => 'El encargado debe ser texto.',
            'encargado.min'      => 'El nombre del encargado debe tener al menos 3 caracteres.',
            'encargado.max'      => 'El nombre del encargado no puede superar los 100 caracteres.',

            'sala_id.required'   => 'La sala es obligatoria.',
            'sala_id.numeric'    => 'El ID de la sala debe ser un número.',
            'sala_id.exists'     => 'La sala seleccionada no existe.',

            'fecha.required'     => 'La fecha del evento es obligatoria.',
            'fecha.date'         => 'La fecha debe ser válida.',

            'estados_id' => 'El estado es obligatorio',
        ];
    }
}

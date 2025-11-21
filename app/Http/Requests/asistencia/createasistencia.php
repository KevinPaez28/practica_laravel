<?php

namespace App\Http\Requests\asistencia;

use Illuminate\Foundation\Http\FormRequest;

class createasistencia extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'usuario_id'     => 'required|exists:users,id',
            'jornada_id'     => 'required|exists:jornadas,id',
            'motivo_id'      => 'required|exists:motivos,id',
            'evento_id'      => 'required|exists:eventos,id',
            'fecha_creacion' => 'required|date',
        ];
    }

    /**
     * Mensajes personalizados
     */
    public function messages(): array
    {
        return [
            'usuario_id.required' => 'El usuario es obligatorio.',
            'usuario_id.exists'   => 'El usuario seleccionado no existe.',

            'jornada_id.required' => 'La jornada es obligatoria.',
            'jornada_id.exists'   => 'La jornada seleccionada no existe.',

            'motivo_id.required'  => 'El motivo es obligatorio.',
            'motivo_id.exists'    => 'El motivo seleccionado no existe.',

            'evento_id.required'  => 'El evento es obligatorio.',
            'evento_id.exists'    => 'El evento seleccionado no existe.',

            'fecha_creacion.required' => 'La fecha de creación es obligatoria.',
            'fecha_creacion.date'     => 'La fecha de creación debe tener formato de fecha.',
        ];
    }
}

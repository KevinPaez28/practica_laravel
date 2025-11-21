<?php

namespace App\Models\asistencia;

use Illuminate\Database\Eloquent\Model;

class asistencia extends Model
{
    protected $fillable = [
        'usuario_id',
        'jornada_id',
        'motivo_id',
        'evento_id',
        'fecha_creacion'
    ];
}

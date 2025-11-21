<?php

namespace App\Services\asistencia;

use App\Models\asistencia\asistencia;

class asistenciaServices
{
    public function get()
    {
        $users = asistencia::all();

        if (count($users) == 0)
            return [
                "error" => false,
                "code" => 200,
                "message" => "No hay asistencia registrados",
                "data" => $users
            ];


        return [
            "error" => false,
            "code" => 200,
            "message" => "asistencia obtenidos con éxito",
            "data" => $users
        ];
    }

    public function total()
    {
        $users = asistencia::count();

        if ($users == 0)
            return [
                "error" => false,
                "code" => 200,
                "message" => "No hay asistencia registrados",
                "data" => $users
            ];


        return [
            "error" => false,
            "code" => 200,
            "message" => "asistencia obtenidos con éxito",
            "data" => [
                "Total de asistencias" => $users
            ]
        ];
    }
    public function Create(array $data)
    {

        $asistencia = asistencia::create([
            "usuario_id"=> $data["usuario_id"],
            "jornada_id"=> $data["jornada_id"],
            "motivo_id"=> $data["motivo_id"],
            "evento_id"=> $data["evento_id"],
            "fecha_creacion"=> $data["fecha_creacion"],
        ]);

        return [
            'error' => false,
            'code' => 201,
            'message' => 'asistencia creada con éxito',
            'data' => $asistencia,
        ];
    }

    public function delete($id)
    {
        $asistencia = asistencia::find($id);

        if (!$asistencia)
            return [
                "error" => true,
                "code" => 404,
                "message" => "asistencia no existe",
            ];

        $asistencia->delete();

        return [
            "error" => false,
            "code" => 200,
            "message" => "asistencia eliminada con éxito",
        ];
    }
}

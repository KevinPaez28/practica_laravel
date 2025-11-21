<?php

namespace App\Services\horario;

use App\Models\horario\horario;

class horarioServices
{
    public function get()
    {
        $users = horario::all();

        if (count($users) == 0)
            return [
                "error" => false,
                "code" => 200,
                "message" => "No hay horario registrados",
                "data" => $users
            ];


        return [
            "error" => false,
            "code" => 200,
            "message" => "horario obtenidos con éxito",
            "data" => $users
        ];
    }
    public function Create(array $data)
    {

        $horario = horario::create([
            'hora_inicio' => $data['hora_inicio'],
            'hora_fin' => $data['hora_fin'],
        ]);

        return [
            'error' => false,
            'code' => 201,
            'message' => 'horario creada con éxito',
            'data' => $horario,
        ];
    }

    public function delete($id)
    {
        $horario = horario::find($id);

        if (!$horario)
            return [
                "error" => true,
                "code" => 404,
                "message" => "El horario no existe",
            ];

        $horario->delete();

        return [
            "error" => false,
            "code" => 200,
            "message" => "horario eliminada con éxito",
        ];
    }
}

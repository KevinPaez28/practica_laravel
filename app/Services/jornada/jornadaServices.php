<?php

namespace App\Services\jornada;

use App\Models\jornada\jornada;

class jornadaServices
{
    public function get()
    {
        $jornada = jornada::all();

        if (count($jornada) == 0)
            return [
                "error" => false,
                "code" => 200,
                "message" => "No hay jornada registrados",
                "data" => $jornada
            ];


        return [
            "error" => false,
            "code" => 200,
            "message" => "jornada obtenidos con éxito",
            "data" => $jornada
        ];
    }
    public function Create(array $data)
    {

        $jornada = jornada::create([
            'nombre' => $data['nombre'],
            'horario_id' => $data['horario_id'],
        ]);

        return [
            'error' => false,
            'code' => 201,
            'message' => 'jornada creada con éxito',
            'data' => $jornada,
        ];
    }

    public function delete($id)
    {
        $jornada = jornada::find($id);

        if (!$jornada)
            return [
                "error" => true,
                "code" => 404,
                "message" => "El jornada no existe",
            ];

        $jornada->delete();

        return [
            "error" => false,
            "code" => 200,
            "message" => "jornada eliminada con éxito",
        ];
    }
}

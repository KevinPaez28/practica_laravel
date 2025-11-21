<?php

namespace App\Services\eventos;

use App\Models\eventos\eventos;

class eventosServices
{
    public function get()
    {
        $eventos = eventos::all();

        if (count($eventos) == 0)
            return [
                "error" => false,
                "code" => 200,
                "message" => "No hay eventos registrados",
                "data" => $eventos
            ];


        return [
            "error" => false,
            "code" => 200,
            "message" => "evento obtenidos con éxito",
            "data" => $eventos
        ];
    }
    public function Create(array $data)
    {

        $eventos = eventos::create([
            'nombre' => $data['nombre'],
            'encargado' => $data['encargado'],
            'sala_id' => $data['sala_id'],
            'fecha' => $data['fecha'],
            'estado_id' => $data['estado_id'],
        ]);

        return [
            'error' => false,
            'code' => 201,
            'message' => 'evento creada con éxito',
            'data' => $eventos,
        ];
    }

    public function delete($id)
    {
        $eventos = eventos::find($id);

        if (!$eventos)
            return [
                "error" => true,
                "code" => 404,
                "message" => "El evento no existe",
            ];

        $eventos->delete();

        return [
            "error" => false,
            "code" => 200,
            "message" => "evento eliminada con éxito",
        ];
    }
}

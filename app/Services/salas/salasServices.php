<?php

namespace App\Services\salas;

use App\Models\Salas\salas;

class salasServices
{
    public function getUser()
    {
        $salas = salas::all();

        if (count($salas) == 0)
            return [
                "error" => false,
                "code" => 200,
                "message" => "No hay sala registrados",
                "data" => $salas
            ];


        return [
            "error" => false,
            "code" => 200,
            "message" => "sala obtenidos con éxito",
            "data" => $salas
        ];
    }
    public function CreateUser(array $data)
    {

        $salas = salas::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
        ]);

        return [
            'error' => false,
            'code' => 201,
            'message' => 'sala creada con éxito',
            'data' => $salas,
        ];
    }

    public function deleteCity($id)
    {
        $salas = salas::find($id);

        if (!$salas)
            return [
                "error" => true,
                "code" => 404,
                "message" => "la sala no existe",
            ];

        $salas->delete();

        return [
            "error" => false,
            "code" => 200,
            "message" => "sala eliminada con éxito",
        ];
    }
}

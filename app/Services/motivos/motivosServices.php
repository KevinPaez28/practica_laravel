<?php

namespace App\Services\motivos;

use App\Models\motivo\motivo;

class motivosServices
{
    public function get()
    {
        $motivo = motivo::all();

        if (count($motivo) == 0)
            return [
                "error" => false,
                "code" => 200,
                "message" => "No hay motivo registrados",
                "data" => $motivo
            ];


        return [
            "error" => false,
            "code" => 200,
            "message" => "motivo obtenidos con éxito",
            "data" => $motivo
        ];
    }
    public function Create(array $data)
    {

        $motivo = motivo::create([
            'nombre' => $data['nombre'],
        ]);

        return [
            'error' => false,
            'code' => 201,
            'message' => 'motivo creada con éxito',
            'data' => $motivo,
        ];
    }

    public function delete($id)
    {
        $motivo = motivo::find($id);

        if (!$motivo)
            return [
                "error" => true,
                "code" => 404,
                "message" => "El motivo no existe",
            ];

        $motivo->delete();

        return [
            "error" => false,
            "code" => 200,
            "message" => "motivo eliminada con éxito",
        ];
    }
}

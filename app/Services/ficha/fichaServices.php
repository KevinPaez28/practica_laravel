<?php

namespace App\Services\ficha;
use App\Models\fichamodels\ficha;
class FichaServices
{
    public function CreateFicha(array $data){
        $ficha = ficha::Create ([ 
        "nombre"=> $data["nombre"],
        "programa_id"=> $data["programa_id"]
        ]);

        return [
            'error' => false,
            'code' => 201,
            'message' => 'Ficha creada con éxito',
            'data' => $ficha,
        ];
    }
}

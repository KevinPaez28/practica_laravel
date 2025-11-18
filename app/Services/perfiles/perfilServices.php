<?php

namespace App\Services\perfiles;

use App\Models\perfilesModels\perfiles;

class perfilServices
{
    public function CreatePerfil(array $data){
        $perfiles = perfiles::Create([
            'usuario_id' => $data['usuario_id'],
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'telefono' => $data['telefono'],
            'correo' => $data['correo'],
            'ficha_id' => $data['ficha_id'],
        ]);

        return [
            'error' => false,
            'code' => 201,
            'message' => 'Perfil creado con éxito',
            'data' => $perfiles,
        ];
        
    }
    
}


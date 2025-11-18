<?php

namespace App\Services\User;

use App\Models\userModels\User;
use PhpParser\Node\Expr\FuncCall;

class userServices
{
    public function getUser()
    {
        $users = User::all();

        if (count($users) == 0)
            return [
                "error" => false,
                "code" => 200,
                "message" => "No hay Usuarios registrados",
                "data" => $users
            ];


        return [
            "error" => false,
            "code" => 200,
            "message" => "Usuarios obtenidos con éxito",
            "data" => $users
        ];
    }
    public function CreateUser(array $data)
    {

        $user = User::create([
            'documento' => $data['documento'],
            'contrasena' => $data['contrasena'],
            'estado_id' => $data['estado_id'],
        ]);

        return [
            'error' => false,
            'code' => 201,
            'message' => 'Usuario creada con éxito',
            'data' => $user,
        ];
    }

    public function deleteCity($id)
    {
        $city = User::find($id);

        if (!$city)
            return [
                "error" => true,
                "code" => 404,
                "message" => "El usuario no existe",
            ];

        $city->delete();

        return [
            "error" => false,
            "code" => 200,
            "message" => "Usuario eliminada con éxito",
        ];
    }
}

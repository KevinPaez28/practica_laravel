<?php

namespace App\Services\programa;

use App\Models\programaModels\programa;

class programaServices
{
  public function getProgramas()
  {
    $users = programa::all();

    if (count($users) == 0)
      return [
        "error" => false,
        "code" => 200,
        "message" => "No hay programas registrados",
        "data" => $users
      ];


    return [
      "error" => false,
      "code" => 200,
      "message" => "Programas obtenidos con éxito",
      "data" => $users
    ];
  }
  public function CreatePrograma(array $data)
  {
    $programa = programa::Create([
      'programa_formacion' => $data['programa_formacion'],
    ]);

    return [
      'error' => false,
      'code' => 201,
      'message' => 'Programa creado con éxito',
      'data' => $programa,
    ];
  }
  public function deleteprograma($id)
    {
        $city = programa::find($id);

        if (!$city)
            return [
                "error" => true,
                "code" => 404,
                "message" => "El programa no existe",
            ];

        $city->delete();

        return [
            "error" => false,
            "code" => 200,
            "message" => "Programa eliminado con éxito",
        ];
    }
}

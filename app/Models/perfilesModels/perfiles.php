<?php

namespace App\Models\perfilesModels;

use Illuminate\Database\Eloquent\Model;

class perfiles extends Model

{
    protected $table = 'perfiles'; 
   protected $filliable =[ 'usuario_id'  , 'nombres' , 'apellidos' , 'telefono', 'correo' , 'ficha_id' ];
}

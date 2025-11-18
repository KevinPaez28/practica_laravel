<?php

namespace App\Models\fichamodels;

use Illuminate\Database\Eloquent\Model;

class ficha extends Model
{

    protected $table = 'ficha'; 
    protected $fillable = ['nombre', 'programa_id'];

}

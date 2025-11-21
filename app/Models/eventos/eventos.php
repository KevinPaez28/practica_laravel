<?php

namespace App\Models\eventos;

use Illuminate\Database\Eloquent\Model;

class eventos extends Model
{
    protected $fillable = ['nombre','encargado','sala_id','fecha','estado_id'];
}

<?php

namespace App\Models\programaModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;



class programa extends Model
{
        use HasFactory,Notifiable;

        protected $table = 'programa_formacion'; 
        protected $fillable = ['programa_formacion'];
}

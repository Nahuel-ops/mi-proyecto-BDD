<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    //  DESTRABA EL CANDADO DE SEGURIDAD (Solución directa al error de la imagen 2)
    protected $fillable = ['turno', 'hora', 'fecha'];
}

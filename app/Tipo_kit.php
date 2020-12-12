<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_kit extends Model
{
    protected $table = "Tipokit";

    protected $fillable = [
        'nombre',
        'elementos_kit',
        'descripcion'
    ];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = "agenda";
    protected $fillable = ['usuario_id','fecha','hora_inicial','hora_final','descripcion','estado'];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $table = 'sensores';

    protected $fillable=[
      'id',
      'Num',
      'idUsuario',
      'idCultivo'
    ];
}

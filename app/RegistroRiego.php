<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroRiego extends Model
{
    protected $table = 'registro_riegos';

    protected $fillable=[
      'id',
      'idCultivo',
      'Area'
    ];
}

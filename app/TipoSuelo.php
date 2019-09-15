<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSuelo extends Model
{
    protected $table = 'tipo_suelos';

    protected $fillable=[
      'id',
      'name',
      'descripcion',
      'infiltracion'
    ];

}

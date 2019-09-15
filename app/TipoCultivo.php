<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCultivo extends Model
{
    protected $table = 'tipo_cultivos';

    protected $fillable=[
      'id',
      'NombreFruto',
      'KC_ENERO',
      'KC_FEBRERO',
      'KC_MARZO',
      'KC_ABRIL',
      'KC_MAYO',
      'KC_JUNIO',
      'KC_JULIO',
      'KC_AGOSTO',
      'KC_SEPTIEMBRE',
      'KC_OCTUBRE',
      'KC_NOVIEMBRE',
      'KC_DICIEMBRE'
    ];
}

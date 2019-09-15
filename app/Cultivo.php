<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{
  protected $fillable=[
    'id',
    'idUsuario',
    'NombreCultivo',
    'TipoCultivo',
    'Ubicacion',
    'TipoRiego',
    'TipoSuelo',
    'TamanoCultivo',
    'AreasRiego',
    'Sensor',
    'Auto'
  ];

public function TipoSuelo(){
          return $this->hasOne('App\TipoSuelo', 'id');
      }
  public function suelo(){
            return $this->hasOne('App\TipoSuelo', 'id');
        }

  public function riego(){
            return $this->hasOne('App\TipoRiego', 'id');
        }

}

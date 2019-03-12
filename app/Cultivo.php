<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{
  public function TipoCultivo(){
        //return $this->belongsTo('App\TipoCultivo', 'id', 'TipoCultivo');
        return $this->belongsTo('App\TipoCultivo');
    }

    public function TipoSuelo(){
          return $this->hasOne('App\TipoSuelo', 'id');
          //return $this->belongsTo('App\TipoSuelo', 'TipoSuelo');
      }
}

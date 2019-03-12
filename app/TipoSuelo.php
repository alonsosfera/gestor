<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSuelo extends Model
{
    protected $table = 'tipo_suelos';

    public function Cultivos(){
        //return $this->hasOne('App\Cultivo', 'TipoSuelo');
        return $this->belongsTo('App\Cultivo', 'TipoSuelo');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCultivo extends Model
{
    protected $table = 'tipo_cultivos';

    public function Cultivos(){
        return $this->hasMany('App\Cultivo', 'TipoCultivo', 'id');
    }
}

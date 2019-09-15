<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectorAuto extends Model
{
    protected $table = 'sectores_auto';

    protected $fillable=[
      'id',
      'idCultivo',
      'Sector'
    ];
}

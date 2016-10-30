<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model{
    protected $table='cotizacion';
    protected $guarded = [];
    protected $primaryKey='folio';

    function trabajos(){
    	return $this->hasMany('App\Trabajo');
    }
}

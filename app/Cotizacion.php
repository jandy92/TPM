<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model{
    protected $table='cotizacion';
    protected $guarded = [];
    protected $primaryKey='folio';

    function trabajos(){
    	//					este_modelo    ,clave _foranea_otro modelo,clave primaria este modelo
    	return $this->hasMany('App\Trabajo','folio_cotizacion','folio');
    }
    //devuelve total sumando los totales de todos sus trabajos
    function total_pesos(){
		$total=0;
    	foreach ($this->trabajos as $job) {
    		$total+=$job->total_pesos();
    	}
    	return $total;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model{
    protected $table='trabajo';
    protected $guarded = ['id'];
    protected $primaryKey='id';

    function cotizacion(){
    	return $this->belongsTo('App\Cotizacion','folio_cotizacion');
    }
    
    function estado(){
    	return $this->belongsTo('App\Estado','estado_id');
    }

    function items(){
        //otro_modelo ,llave_foranea_del_otro_modelo,llave_primaria_este modelo
    	return $this->hasMany('App\Item','id_trabajo','id');
    }
    
    //devuelve el total en pesos del trabajo
    function total_pesos(){
        $total=0;
        foreach($this->items as $i){
            $total+=$i->cantidad*$i->precio_unitario;
        }
        return $total;
    }


}
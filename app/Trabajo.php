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
    	return $this->hasOne('App\estado');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model{
 	protected $table='contacto';
    protected $guarded = [];
    //public $incrementing = false;
    protected $primaryKey='id_contacto';
    
    public function clientes(){
 		return $this->belongsToMany('App\Cliente');	
 	} 

	public function cotizaciones(){
		return $this->hasMany('App\Cotizacion','id_contacto','id_contacto');
 	}
}

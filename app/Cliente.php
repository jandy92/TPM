<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    protected $table='cliente';
    protected $guarded = [];
    public $incrementing = false;
    protected $primaryKey='rut_cliente';
 
 	public function contactos(){
 		return $this->hasMany('App\Contacto','rut_cliente','rut_cliente');
 	}

 	public function cotizacion(){
    	return $this->hasMany('App\Cotizacion','rut_cliente');
    }   
}
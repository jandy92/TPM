<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    protected $table='cliente';
    protected $guarded = [];
    //public $incrementing = false;
    protected $primaryKey='id_cliente';
 
 	public function contactos(){
 		return $this->hasMany('App\Contacto','id_cliente','id_cliente');
 		//return $this->hasMany('App\Contacto');
 	}   
}
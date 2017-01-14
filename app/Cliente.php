<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    protected $table='cliente';
    protected $guarded = [];
    //public $incrementing = false;
    protected $primaryKey='id_cliente';
 
 	public function contactos(){
 		return $this->belongsToMany('App\Contacto','cliente_contacto','id_cliente','id_contacto');
 	}   
}
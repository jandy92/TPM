<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model{
	use SoftDeletes;
    protected $table='cliente';
     protected $dates = ['deleted_at'];
    protected $guarded = [];
    //public $incrementing = false;
    protected $primaryKey='id_cliente';
 
 	public function contactos(){
 		return $this->belongsToMany('App\Contacto','cliente_contacto','id_cliente','id_contacto');
 	}

 	public function cotizaciones(){
 		return $this->hasMany('App\Cotizacion','id_cliente','id_cliente');
 	}
}
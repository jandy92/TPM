<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model{
 	protected $table='contacto';
    protected $guarded = [];
    //public $incrementing = false;
    protected $primaryKey='id_contacto';
    public function cliente(){
    	return $this->belongsTo('App\Cliente','id_cliente','id_cliente');
    } 
}

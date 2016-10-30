<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model{
    protected $table='contacto';
    protected $guarded = [];
    public $incrementing = false;
    protected $primaryKey='rut';
    function clientes(){
    	return $this->belongsToMany('App\Cliente','contacto_cliente','contacto_rut','cliente_rut');
    }
}

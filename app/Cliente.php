<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Contacto;

class Cliente extends Model{
    protected $table='cliente';
    protected $guarded = [];
    public $incrementing = false;
    protected $primaryKey='rut';
    
    function contactos(){
    	return $this->belongsToMany('App\Contacto','contacto_cliente','cliente_rut','contacto_rut');
    }
}

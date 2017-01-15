<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
   protected $table = 'cotizacion';
   protected $guarded = [];
   protected $primaryKey='folio_cotizacion';


	public function contacto(){
 		return $this->belongsTo('App\Contacto','id_contacto','id_contacto');
 	}

 	public function cliente(){

 		return $this->belongsTo('App\Cliente','id_cliente','id_cliente');
 	}

 	public function tipo_trabajo(){
 		return $this->belongsTo('App\Tipo_trabajo','id_tipo_trabajo','id_tipo_trabajo');
 		//return $this->hasMany('App\Id_trabajo','id_tipo_item','id_tipo_item');
 	}

 	public function item(){
 		return $this->belongsToMany('App\Item','cotizacion_item','id_item','folio_cotizacion');
 	}


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cotizacion extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];
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

 	public function items(){
 		return $this->belongsToMany('App\Item','cotizacion_item','folio_cotizacion','id_item');
 	}


}

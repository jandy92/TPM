<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model{
	use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'item';
   protected $guarded = [];
   protected $primaryKey='id_item';

   public function cotizacion(){
 		return $this->belongsToMany('App\Cotizacion','cotizacion_item','id_item','folio_cotizacion');
 	}

   public function tipo_item(){

   	return $this->belongsTo('App\Tipo_item', 'id_tipo_item','id_tipo_item');
   }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
   protected $guarded = [];
   protected $primaryKey='id_item';

   public function cotizacion(){
 		return $this->belongsToMany('App\Cotizacion','cotizacion_item','folio_cotizacion','id_item');
 	}

   public function tipo_item(){

   	return $this->hasMany('App\Tipo_item', 'id_tipo_item',,'id_tipo_item');
   }


}

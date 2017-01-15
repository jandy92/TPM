<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_trabajo extends Model
{
   protected $table = 'tipo_trabajo';
   protected $guarded = [];
   protected $primaryKey='id_tipo_trabajo';

   public function cotizacion(){
		return $this->hasMany('App\Cotizacion','id_tipo_trabajo','id_tipo_trabajo');
		//return $this->belongsTo('App\Cotizacion','id_tipo_trabajo','id_tipo_trabajo');
   }
}

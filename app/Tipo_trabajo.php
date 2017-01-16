<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo_trabajo extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];
   protected $table = 'tipo_trabajo';
   protected $guarded = [];
   protected $primaryKey='id_tipo_trabajo';

   public function cotizacion(){
		return $this->hasMany('App\Cotizacion','id_tipo_trabajo','id_tipo_trabajo');
		//return $this->belongsTo('App\Cotizacion','id_tipo_trabajo','id_tipo_trabajo');
   }
}

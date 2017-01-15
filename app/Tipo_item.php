<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_material extends Model
{
	protected $table = 'tipo_item';
	protected $guarded = [];
	protected $primaryKey='id_tipo_item';

	public function item(){
		return $this->belongsTo('App\Item','id_tipo_item','id_tipo_item');
	}
}

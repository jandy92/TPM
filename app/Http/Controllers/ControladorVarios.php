<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidad_medida;
use App\Http\Requests\NuevaUnidadMedidaRequest;
class ControladorVarios extends Controller
{
	function unidades_de_medida_lista(){
		$unidades=Unidad_medida::all();
		return view("backend.varios.unidad_medida_lista",compact('unidades'));
	}  
	function nuevo_unidad_medida(NuevaUnidadMedidaRequest $r){
		$u=new Unidad_medida();
		$u->nombre=$r->get('nombre');
		$u->nombre_abreviacion=$r->get('abreviacion');
		$u->save();
		return redirect()->action('ControladorVarios@unidades_de_medida_lista');

	}  

}
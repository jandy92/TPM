<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidad_medida;
use App\Http\Requests\NuevaUnidadMedidaRequest;
class ControladorVarios extends Controller
{


	/*
	Se le asignan todos los datos de la tabla "Unidad_Medida"
	a la variable $unidades, para luego entregarlos a la
	vista "unidad_medida_lista", donde se mostrara estos datos
	en una lista.
	*/
	function unidades_de_medida_lista(){
		$unidades=Unidad_medida::all();
		return view("backend.varios.unidad_medida_lista",compact('unidades'));
	}


	/*
	Se crea una nueva unidad de medida y se le asigna a la variable
	$u, luego se le asignan a los campos "nombre" y "nombre_abreviacion"
	los datos ingresados en la vista "unidad_medida_lista".
	*/  
	function nuevo_unidad_medida(NuevaUnidadMedidaRequest $r){
		$u=new Unidad_medida();
		$u->nombre=$r->get('nombre');
		$u->nombre_abreviacion=$r->get('abreviacion');
		$u->save();
		return redirect()->action('ControladorVarios@unidades_de_medida_lista');

	}  

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidad_medida;
class ControladorVarios extends Controller
{
	function unidades_de_medida_lista(){
		$unidades=Unidad_medida::all();
		return view("backend.varios.unidad_medida_lista",compact('unidades'));
	}    

}
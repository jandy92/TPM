<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorVarios extends Controller
{
	function unidades_de_medida_lista(){
		return view("backend.varios.unidad_medida_lista");
	}    

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cotizacion;

class ControladorPaginas extends Controller
{
	/*
	Función encargada en mostrar la primera pantalla de la aplicación junton con un dato extra que corresponde a la cantidad de cotizaciones que estan sin un trabajo asociado.
	*/
    public function home()
	{
		 $cotizacion = Cotizacion::all();
        $cont = 0;
        foreach ($cotizacion as $cot) {
            if(empty($cot->trabajo)){
                $cont=$cont +1;
            }
        }
        return view('principal',compact('cont'));
	}
}

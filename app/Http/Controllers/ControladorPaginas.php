<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cotizacion;

class ControladorPaginas extends Controller
{
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

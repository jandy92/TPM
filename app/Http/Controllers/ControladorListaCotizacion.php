<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorListaCotizacion extends Controller
{
    function listaCotizacion(){
    	return view('backend.cotizacion.lista_cotizacion');
    }
}

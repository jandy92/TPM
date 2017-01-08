<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorCotizacion extends Controller
{
    function nuevaCotizacionForm(){
    	return view('backend.cotizacion.crear_cotizacion');
    }
    function listaCotizacion(){
    	return view('backend.cotizacion.lista_cotizacion');
    }
}

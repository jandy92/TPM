<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorCotizacion extends Controller
{
    function nuevaCotizacionForm(){
    	return view('backend.cotizacion.crear_cotizacion');
    }
}

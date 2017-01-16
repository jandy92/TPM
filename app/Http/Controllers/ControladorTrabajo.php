<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NuevoTrabajoRequest;
use App\Http\Controllers\Controller;
use App\Cotizacion;
use App\Tipo_trabajo;

class ControladorTrabajo extends Controller
{
	function nuevoTrabajoForm($folio_cotizacion){
		$cotizacion = Cotizacion::find($folio_cotizacion);
		$tipo_trabajo = Tipo_trabajo::all();
    	return view('backend.trabajo.formulario_trabajo', compact("cotizacion"), compact("tipo_trabajo"));
    }
    //
    function nuevoTrabajo(NuevoTrabajoRequest $r){
			$trabajo = new Trabajo(array(
            	'numero_factura'=>$r->get('numero_factura'),
            	'fecha_emision_cobro'=>$r->get('fecha_emision'),
            	'fecha_pago'=>$r->get('fecha_pago'),
            	'receptor_factura'=>$r->get('receptor_factura'),
            	'orden_trabajo'=>$r->get('orden_trabajo'),
            	'comentario'=>$r->get('comentario')
        	));

	}
}
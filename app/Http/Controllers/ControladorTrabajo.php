<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NuevoTrabajoRequest;
use App\Http\Controllers\Controller;
use App\Cotizacion;
use App\Tipo_trabajo;
use App\Estado;
use App\Trabajo;

class ControladorTrabajo extends Controller{
	function nuevoTrabajoForm($folio_cotizacion){
		$cotizacion = Cotizacion::find($folio_cotizacion);
		$tipo_trabajo = Tipo_trabajo::all();
		$estados = Estado::all();
    	return view('backend.trabajo.formulario_trabajo', compact("cotizacion","tipo_trabajo","estados"));
    }
    //
    function nuevoTrabajo(NuevoTrabajoRequest $r){
			$trabajo = new Trabajo(array(
            	'numero_factura'=>$r->get('numero_factura'),
            	'fecha_emision_cobro'=>$r->get('fecha_emision_cobro'),
            	'fecha_pago'=>$r->get('fecha_pago'),
            	'receptor_factura'=>$r->get('receptor_factura'),
            	'orden_trabajo'=>$r->get('orden_trabajo'),
            	'comentario'=>$r->get('comentario'),
            	'orden_compra'=>$r->get('orden_compra'),
            	'id_estado'=>$r->get('estado')
        	));
        	$trabajo->save();
        	$msg =['title'=>'Operacion realizada','text'=>'Se ha guardado un trabajo nuevo'];
	    	return redirect()->action('ControladorCotizacion@listaCotizacion')->with('mensaje',$msg);
	}

	function editarTrabajoForm($id_trabajo){
		$trabajo = Trabajo::find($id_trabajo);
		return view('backend.trabajo.editar_trabajo', compact("trabajo"));
	}
	function editarTrabajo(EditarTrabajoRequest $r){
		$trabajo->numero_factura = $r->get('numero_factura');
		$trabajo->fecha_emision_cobro = $r->get('fecha_emision_cobro');
		$trabajo->fecha_pago = $r->get('fecha_pago');
		$trabajo->receptor_factura = $r->get('receptor_factura');
		$trabajo->orden_trabajo = $r->get('orden_trabajo');
		$trabajo->comentario = $r->get('comentario');
		$trabajo->id_estado = $r->get('estado');
		$trabajo->orden_compra = $r->get('orden_compra');
		$trabajo->save();
		$msg =['title'=>'Operacion realizada','text'=>'Se ha editado el trabajo'];
		return redirect()->action('ControladorCotizacion@listaCotizacion')->with('mensaje',$msg);
	}
}
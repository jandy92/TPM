<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NuevoTrabajoRequest;
use App\Http\Requests\EditarTrabajoRequest;
use App\Http\Controllers\Controller;
use App\Cotizacion;
use App\Tipo_trabajo;
use App\Estado;
use App\Trabajo;
use DB;
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
            	'id_estado'=>$r->get('estado'),
            	'folio_cotizacion'=>$r->get('folio'),
        	));
        	$trabajo->save();
        	$msg =['title'=>'Operacion realizada','text'=>'Se ha guardado un trabajo nuevo'];
	    	return redirect()->action('ControladorCotizacion@listaCotizacion')->with('mensaje',$msg);
	}

	function editarTrabajoForm($id_trabajo){
		$trabajo = Trabajo::find($id_trabajo);
		$estados = Estado::all();
		return view('backend.trabajo.editar_trabajo', compact("trabajo","estados"));

	}
	function editarTrabajo(EditarTrabajoRequest $r){
		$trabajo = Trabajo::find($r->get('id_trabajo'));
		//return $trabajo;
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
	function listaDeTrabajo(){
    	$trabajo=Trabajo::all();
    	return view('backend.trabajo.lista_trabajo',compact('trabajo'));
    }

    function AJAX_busquedaTrabajos($texto){
        
        $trabajo=Trabajo::whereHas('cotizacion',function($q)use($texto){
        	$q->whereHas('cliente',function($q)use($texto){
        		$q->where('nombre','LIKE','%'.$texto.'%');})->orWhereHas('contacto',function($q)use($texto){
        			$q->where('nombre','LIKE','%'.$texto.'%');
        		});
        })->orWhere('folio_cotizacion','LIKE','%'.$texto.'%')->orWhere('numero_factura','LIKE','%'.$texto.'%')->get();

/*
        $trabajo=Trabajo::where('id_trabajo','LIKE','%'.$texto.'%')->get();
*/		foreach($trabajo as $tr){
        	$tr['cliente']=$tr->cotizacion->cliente->nombre;
        	$tr['contacto']=$tr->cotizacion->contacto->nombre." ".$tr->cotizacion->contacto->apellido;
        	$tr['nombre_estado']=$tr->estado->nombre;
    	}
       	return response()->json($trabajo);
	}
	function informacionTrabajo($id_trabajo){
    	$trabajo=Trabajo::find($id_trabajo);
    	return view('backend.trabajo.informacion_trabajo',compact('trabajo'));
    }

}
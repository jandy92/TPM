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
    
    /*
    En esta funcion se asignan los datos de las tablas "Cotizacion" (con su id
    se busca la cotizacion que se necesita), "Tipo_trabajo" y "Estado" a 3 
    variables las cuales serán entregadas a la vista "formulario_trabajo.blade.php"
    para que pueda mostrar los datos de estas tablas.
    */
	function nuevoTrabajoForm($folio_cotizacion){
		$cotizacion = Cotizacion::find($folio_cotizacion);
		$tipo_trabajo = Tipo_trabajo::all();
		$estados = Estado::all();
    	return view('backend.trabajo.formulario_trabajo', compact("cotizacion","tipo_trabajo","estados"));
    }
    

    /*
    Este metodo es el encargado de obtener los datos de la vista
    mediante un "request", con el que se conecta a la vista y obtiene
    los datos guardados en la vista para asignarselos a un trabajo nuevo
    en la base de datos. 
    */
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


    /*
    Esta funcion tiene como funcion encontrar el trabajo en la base
    de datos que este asociado a $id_trabajo en la tabla "Trabajo"
    para luego entregarselo a la variable $trabajo, tambien entregar 
    todos los datos de la tabla "Estado" en la variable $estados,
    luego ambos seran entregados a la vista "editar_trabajo.blade.php"
    para que esta muestre los datos
    */
	function editarTrabajoForm($id_trabajo){
		$trabajo = Trabajo::find($id_trabajo);
		$estados = Estado::all();
		return view('backend.trabajo.editar_trabajo', compact("trabajo","estados"));
    }


    /*
    Esta funcion se encarga de obtener los datos ingresados
    en la vista, luego encontrar el trabajo asociado a esa id
    para modificar los datos que tenia previamente ingresados
    y asi permitir la edicion de los trabajos, luego redirecciona
    a la lista de cotizaciones. 
    */
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


    /*
    Esta funcion se encarga de encontrar todos los datos de la tabla
    "Trabajo" en la base de datos para luego entregárselos a la vista
    "lista_trabajo" y asi mostrar todos los trabajos.
    */
	function listaDeTrabajo(){
    	$trabajo=Trabajo::all();
    	return view('backend.trabajo.lista_trabajo',compact('trabajo'));
    }


    /*
    Esta funcion se encarga de realizar el filtro de los trabajos
    para que el usuario pueda encontrar el trabajo buscado, esto lo
    realiza en la vista "lista_trabajo".
    */
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


    /*
    Esta funcion se encarga de encontrar un trabajo en la base de
    datos mediante la variable $id_trabajo, se entregan los datos
    a la variable $trabajo que luego se entregará a la vista
    "informacion_trabajo" que mostrará los datos del trabajo que
    concuerde con la $id_trabajo.
    */
	function informacionTrabajo($id_trabajo){
    	$trabajo=Trabajo::find($id_trabajo);
    	return view('backend.trabajo.informacion_trabajo',compact('trabajo'));
    }

}
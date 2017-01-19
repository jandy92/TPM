<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NuevoTipoTrabajoRequest;
use App\Http\Requests\EditarTipoTrabajoRequest;
use App\Tipo_trabajo;

class ControladorTipoTrabajo extends Controller
{

	/*
	En esta funcion se consiguen todos los datos de la tabla
	"Tipo_trabajo" para luego ser entregados a la vista "tipo_trabajo"
	mediante la variable $tiposTrabajos.
	*/
	function tipoTrabajoForm(){
		$tiposTrabajos=Tipo_trabajo::all();
		return view('backend.tipoTrabajo.tipo_trabajo',compact('tiposTrabajos'));
	}


	/*
	Se crea un nuevo "Tipo_trabajo" al cual se le asigna un
	nombre ingresado en la vista para luego registrarlo en 
	la base de datos.
	*/
	function nuevoTipoTrabajo(NuevoTipoTrabajoRequest $req){
		$tipoTrab=new Tipo_trabajo();
		$tipoTrab->nombre=$req->get('nombre');
		$tipoTrab->save();

		return redirect()->action('ControladorTipoTrabajo@tipoTrabajoForm');
	}


	/*
	Se busca el trabajo con respecto a su id con la variable
	$idTipoTrabajo y se almacena en $tipoTrab, luego a la variable
	$tiposTrabajos se le asignan todos los trabajos, finalmente estas
	dos variables se le entregan a la vista "editar_tipo_trabajo".
	*/
	function editarTipoTrabajoForm($idTipoTrabajo){
		$tipoTrab=Tipo_trabajo::find($idTipoTrabajo);
		$tiposTrabajos=Tipo_trabajo::all();
		return view('backend.tipoTrabajo.editar_tipo_trabajo', compact('tipoTrab'), compact('tiposTrabajos'));
	}


	/*
	En esta funcion se busca el trabajo asociado a su id_tipo_trabajo
	para luego modificar el nombre del tipo de trabajo por el ingresado
	por el usuario administrador.
	*/
	function editarTipoTrabajo(EditarTipoTrabajoRequest $req){
		$tipoTrab=Tipo_trabajo::find($req->get('id_tipo_trabajo'));
		$tipoTrab->nombre=$req->get('nombre');
		$tipoTrab->save();

        return redirect()->action('ControladorTipoTrabajo@tipoTrabajoForm');
    }
}

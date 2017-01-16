<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NuevoTipoTrabajoRequest;
use App\Http\Requests\EditarTipoTrabajoRequest;
use App\Tipo_trabajo;

class ControladorTipoTrabajo extends Controller
{
	function tipoTrabajoForm(){
		$tiposTrabajos=Tipo_trabajo::all();
		return view('backend.tipoTrabajo.tipo_trabajo',compact('tiposTrabajos'));
	}

	function nuevoTipoTrabajo(NuevoTipoTrabajoRequest $req){
		$tipoTrab=new Tipo_trabajo();
		$tipoTrab->nombre=$req->get('nombre');
		$tipoTrab->save();

		return redirect()->action('ControladorTipoTrabajo@tipoTrabajoForm');
	}

	function editarTipoTrabajoForm($idTipoTrabajo){
		$tipoTrab=Tipo_trabajo::find($idTipoTrabajo);
		$tiposTrabajos=Tipo_trabajo::all();
		return view('backend.tipoTrabajo.editar_tipo_trabajo', compact('tipoTrab'), compact('tiposTrabajos'));
	}

	function editarTipoTrabajo(EditarTipoTrabajoRequest $req){
		$tipoTrab=Tipo_trabajo::find($req->get('id_tipo_trabajo'));
		$tipoTrab->nombre=$req->get('nombre');
		$tipoTrab->save();

        return redirect()->action('ControladorTipoTrabajo@tipoTrabajoForm');
    }
}

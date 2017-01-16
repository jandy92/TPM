<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NuevoTipoTrabajoRequest;
use App\Tipo_trabajo;

class ControladorTipoTrabajo extends Controller
{
    function tipoTrabajoForm(){
    	$tiposTrabajos=Tipo_trabajo::all();
    	return view('backend.tipoTrabajo.tipo_trabajo',compact('tiposTrabajos'));
    }

	function nuevoTipoTrabajo(NuevoTipoTrabajoRequest $req){
		$tipoTrab=new Tipo_trabajo();
		$tipoTrab->nombre=$req->get('nombre');;
		$tipoTrab->save();

		return redirect()->action('ControladorTipoTrabajo@tipoTrabajoForm');
	}
}

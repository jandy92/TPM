<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditarContactoRequest;
use App\Contacto;

class ControladorContacto extends Controller
{
	function editarContactoForm($idContacto){
		$contacto = Contacto::find($idContacto);
		return view("backend.cliente.editar_contacto", compact('contacto'));
	}
	
	function editarContacto(EditarContactoRequest $req){
        $contacto = Contacto::find($req->get('id_contacto'));
		
		$contacto->nombre = $req->get('nombre');
		$contacto->apellido = $req->get('apellido');
		$contacto->email = $req->get('email');
		$contacto->telefono = $req->get('telefono');

		$contacto->save();

        return redirect()->action('ControladorCliente@listaDeContacto');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditarContactoRequest;
use App\Contacto;
use DB;

class ControladorContacto extends Controller
{
	/*
	Recibe como parametro la ID de un contacto, busca esta entrada en la base de datos y 
	se guadar en la variable $contacto, luego se retorna la vista para editar contacto 
	junto a los datos de ese contacto
	*/
	function editarContactoForm($idContacto){
		$contacto = Contacto::find($idContacto);
		return view("backend.cliente.editar_contacto", compact('contacto'));
	}
	

	/*
	La función los datos de contacto de la vista de editar contacto, luego se busca ese contacto en la base de datos, despues se le dan los valores de cada uno de sus parametros segun los obtenidos de la vista y se guardan en la base de datos.

	Este metodo se encarga de hacer el UPDATE de un contacto con los nuevos datos que le estoy asignando.
	*/
	function editarContacto(EditarContactoRequest $req){
        $contacto = Contacto::find($req->get('id_contacto'));
		
		$contacto->nombre = $req->get('nombre');
		$contacto->apellido = $req->get('apellido');
		$contacto->email = $req->get('email');
		$contacto->telefono = $req->get('telefono');

		$contacto->save();

        return redirect()->action('ControladorCliente@listaDeContacto');
    }


    /*
    Esta función se llama desde una petición ajax, sirve para buscar contactos segun una cadena ingresada, esta cadena puede estar contenida en los campos nombre o apellido, luego retorna mediante json el contacto con el que haya coincidencia.
    */
    function buscarContacto($texto){
    	$contactos=DB::table('contacto')->where('nombre','LIKE','%'.$texto.'%')->orWhere('apellido','LIKE','%'.$texto.'%')->get();

        return response()->json($contactos);
    }
}

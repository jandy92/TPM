<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NuevoClienteRequest;
use App\Cliente;
class ControladorCliente extends Controller
{
    function nuevoClienteForm(){
    	return view('backend.cliente.registrar_cliente');
    }

    function nuevoCliente(NuevoClienteRequest $r){
    	$contactos=[];
    	foreach($r->get('contactos') as $c){
    		array_push($contactos,explode(',',$c));
    	}
    	return $contactos;
    }

    function listaDeCliente(){
    	$cliente=Cliente::all();
    	return view('backend.cliente.lista_cliente',compact('cliente'));
    }
}

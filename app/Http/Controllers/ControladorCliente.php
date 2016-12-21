<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
class ControladorCliente extends Controller
{
    function nuevoClienteForm(){
    	return view('backend.cliente.registrar_cliente');
    }
    function listaDeCliente(){
    	$cliente=Cliente::all();
    	return view('backend.cliente.lista_cliente',compact('cliente'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorListaCliente extends Controller
{
     function listaDeCliente(){
    	return view('backend.cliente.lista_cliente');
    }
}

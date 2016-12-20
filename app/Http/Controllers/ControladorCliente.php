<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorCliente extends Controller
{
    function nuevoClienteForm(){
    	return view('backend.cliente.registrar_cliente');
    }
}

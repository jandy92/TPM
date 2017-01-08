<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ControladorUsuario extends Controller{

    function listaUsuario(){
    	$usuarios=User::all();
    	return view ('backend.usuario.lista_usuario',compact('usuarios'));
    }
}

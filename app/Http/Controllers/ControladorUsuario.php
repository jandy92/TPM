<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NuevoUsuarioRequest;

use App\User;
use App\Role;
class ControladorUsuario extends Controller{

    function listaUsuario(){
    	$usuarios=User::all();
    	return view ('backend.usuario.lista_usuario',compact('usuarios'));
    }

    function nuevoUsuarioForm(){
    	$roles=Role::all();
    	return view('backend.usuario.nuevo',compact('roles'));
    }

    function crearNuevoUsuario(NuevoUsuarioRequest $req){

    	return redirect()->action('ControladorUsuario@listaUsuario')->with('mensaje',['title'=>'Usuario creado con éxito!','text'=>'
    		Recuerde proporcionar la contraseña temporal: ']);
    }
}

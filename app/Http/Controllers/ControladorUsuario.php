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
        $u = new User(array(
            'name'=>$req->get('nombre'),
            'email'=>$req->get('email'),
            'password'=>bcrypt($req->get('pwd')),
        ));
        if($req->get('activado')){
            $u->activado=1;
        }
        $u->save();
        if($req->get('rol')>0){
            $r=Role::find(intval($req->get('rol')));
            $u->attachRole($r);
        }
    	return redirect()->action('ControladorUsuario@listaUsuario')->with('mensaje',['title'=>'Usuario creado con éxito!','text'=>'
    		Usuario creado con éxito!']);
    }

    function activarUsuario($id){
        $u=User::whereId($id)->first();
        if($u->activado==0){
            $u->activado=1;
            $u->save();
            return redirect()->action('ControladorUsuario@listaUsuario')->with('mensaje',['title'=>'Usuario activado con éxito!','text'=>'
            Usuario ['.$u->name.'] ha sido activado con éxito!']);
        }else{
            return redirect()->action('ControladorUsuario@listaUsuario')->with('mensaje',['title'=>'Usuario prevamente activado','text'=>'
            Usuario ['.$u->name.'] estaba activado antes de la solicitud']);
        }
    }

    function borrarUsuario($id){
        $u=User::whereId($id)->first();
        if($u->name!='admin'){
            $u->delete();
            return redirect()->action('ControladorUsuario@listaUsuario')->with('mensaje',['title'=>'Usuario eliminado con éxito!','text'=>'
            Usuario ['.$u->name.'] ha sido eliminado con éxito!']);    
        }else{
            return redirect()->action('ControladorUsuario@listaUsuario')->with('mensaje',['title'=>'Error eliminado usuario','text'=>'
            Usuario ['.$u->name.'] no puede ser eliminado!']);
        }
    }
}

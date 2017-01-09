<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NuevoUsuarioRequest;
use App\Http\Requests\EditarUsuarioRequest;

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
        if($u->email!='admin@localhost.com'){
            $u->delete();
            return redirect()->action('ControladorUsuario@listaUsuario')->with('mensaje',['title'=>'Usuario eliminado con éxito!','text'=>'
            Usuario ['.$u->name.'] ha sido eliminado con éxito!']);    
        }else{
            return redirect()->action('ControladorUsuario@listaUsuario')->with('mensaje',['title'=>'Error eliminado usuario','text'=>'
            Usuario ['.$u->name.'] no puede ser eliminado!']);
        }
    }

    function editarUsuarioForm($id){
        $usuario=User::whereId($id)->first();
        if($usuario&&$usuario->email!='admin@localhost.com'){
            $roles=Role::all();
            return view('backend.usuario.editar_usuario',compact('usuario','roles'));
        }else{
            return redirect()->action('ControladorUsuario@listaUsuario')->with('mensaje',['title'=>'Error al intentar editar usuario','text'=>'El usuario no existe o no puede ser modificado']);;
        }
    }

    function editarUsuario(EditarUsuarioRequest $req){
        $u=User::whereId($req->get('id_usuario'))->first();
        $cambios=false;
        $new_pass=$req->get('pwd');
        $new_name=$req->get('nombre');
        $new_rol=intval($req->get('rol'));
        $new_email=$req->get('email');

        if($new_pass!=''){
            $u->password=bcrypt($new_pass);
            $u->save();
            $cambios=true;
        }

        if($new_name!=$u->name){
            $u->name=$new_name;
            $u->save();
            $cambios=true;
        }

        if($new_email!='' && $new_email!=$u->email){
            $u->email=$new_email;
            $u->save();
            $cambios=true;
        }

        if($new_rol>0){
            if($u->roles->first()&&$new_rol!=$u->roles->first()->id){
                $u->detachRoles($u->roles);
                $r=Role::find($new_rol);
                $u->attachRole($r);
            $cambios=true;
            }
            else{
                if(!$u->roles->first()){
                    $r=Role::find($new_rol);
                    $u->attachRole($r);
            $cambios=true;
                }
            }
        }else{
            $u->detachRoles($u->roles);
            $cambios=true;
        }
        $titulo="";$texto="";
        if($cambios){
            $titulo="Cambios guardados";
            $texto="Se han guardado los cambios realizados en el usuario [".$u->name."]";
        }else{
            $titulo="Sin cambios";
            $texto="No se han detectado cambios en el usuario [".$u->name."]";
        }
        $mensaje=['title'=>$titulo,'text'=>$texto];
        return redirect()->action('ControladorUsuario@listaUsuario')->with('mensaje',$mensaje);
    }
}

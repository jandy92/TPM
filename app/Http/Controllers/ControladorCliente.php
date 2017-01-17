<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NuevoClienteRequest;
use App\Http\Requests\EditarClienteRequest;
use App\Http\Requests\NuevoContactoRequest;
use App\Cliente;
use App\Contacto;

use DB;

class ControladorCliente extends Controller
{

    function nuevoContactoForm(){
        return view('backend.cliente.registrar_contacto');
    }

    function nuevoContacto(NuevoContactoRequest $r){
        $contacto=new Contacto();
        $contacto->nombre=$r->get('nombre');
        $contacto->apellido=$r->get('apellido');
        $contacto->email=$r->get('email');
        $contacto->telefono=$r->get('telefono');
        $contacto->save();
        return redirect()->action('ControladorCliente@listaDeContacto');
        //return $contacto;
    }

    function nuevoClienteForm(){
    	$contactos=Contacto::all();
        return view('backend.cliente.registrar_cliente',compact('contactos'));
    }

    function nuevoCliente(NuevoClienteRequest $r){
    	//$contactos=[];
        $cliente=new Cliente(array(
            'rut_cliente'=>$r->get('rut'),
            'nombre'=>$r->get('nombre'),
            'giro'=>$r->get('giro'),
            'telefono'=>$r->get('telefono'),
            'direccion'=>$r->get('direccion')
        ));
        $cliente->save();


        //return $r->get('contactos');
        if($r->get('contactos')){
        	foreach($r->get('contactos') as $c){
                $contacto=Contacto::find($c);
                $cliente->contactos()->save($contacto);
            }
        }
        $msg =['title'=>'Operación exitosa','text'=>'Se ha registrado un nuevo cliente.'];
    	return redirect()->action('ControladorCliente@listaDeCliente')->with('mensaje',$msg);
    }
    
    function editarClienteForm($idCliente){
        $cliente = Cliente::find($idCliente);
        return view("backend.cliente.editar_cliente", compact("cliente"));
    }

    function editarCliente(EditarClienteRequest $r){
        $cliente = Cliente::find($r->get('id_cliente'));
        $rutTemp = $r->get('rut');
        if (strlen (  $rutTemp ) > 1){
            $cliente->rut_cliente = $r->get('rut');
        }
        $cliente->nombre = $r->get('nombre');
        $cliente->direccion = $r->get('direccion');
        $cliente->giro = $r->get('giro');
        $cliente->telefono = $r->get('telefono');
        $cliente->save();
        $msj=["title" => "Registro", "text" => "Te registraste"];
        return redirect()->action('ControladorCliente@listaDeCliente')->with("mensaje", $msj);
    }


    function listaDeCliente(){
    	$clientes=Cliente::all();
    	return view('backend.cliente.lista_cliente',compact('clientes'));
    }

    function listaDeContacto(){
        $contactos=Contacto::all();
        return view('backend.cliente.lista_contacto',compact('contactos'));
    }

    function AJAX_contactosDeCliente($id_cliente){
        $c=Cliente::find($id_cliente);
        if($c){
            if($c->contactos){
                return response()->json($c->contactos);
            }else{
                return response()->json([]);
            }
        }else{
            return response()->json([]);
        }
    }

    function AJAX_busquedaClientes($texto){
        $clientes=DB::table('cliente')->where('nombre','LIKE','%'.$texto.'%')->orWhere('rut_cliente','LIKE','%'.$texto.'%')->get();
        return response()->json($clientes);
    }

    function buscaContactos($rut_cliente){
        //$cliente = DB::table('cliente')->where('rut_cliente','=', $rut_cliente)->first();
        $cliente=Cliente::whereRut_cliente($rut_cliente)->first();
        if ($cliente){
            return response()->json(['cliente'=>$cliente,'contactos'=>$cliente->contactos]);
        }
    }
}

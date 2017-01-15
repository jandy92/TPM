<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NuevoClienteRequest;
use App\Http\Requests\EditarClienteRequest;

use App\Cliente;
use App\Contacto;

use DB;

class ControladorCliente extends Controller
{
    function nuevoClienteForm(){
    	return view('backend.cliente.registrar_cliente');
    }

    function nuevoContactoForm(){
        return view('backend.cliente.registrar_contacto');
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

        if($r->get('contactos')){
        	foreach($r->get('contactos') as $c){
                $tmp_array=explode(',',$c);
        		//array_push($contactos,$tmp_array);
                $contacto=new Contacto(array(
                    'nombre'=>$tmp_array[0],
                    'apellido'=>$tmp_array[1],
                ));
                $contacto->email=$tmp_array[2];
                $contacto->telefono=$tmp_array[3];
                //return $cliente;
                //$cliente->contactos()->save($contacto);
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

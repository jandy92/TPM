<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NuevoClienteRequest;

use App\Cliente;
use App\Contacto;

class ControladorCliente extends Controller
{
    function nuevoClienteForm(){
    	return view('backend.cliente.registrar_cliente');
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


    function listaDeCliente(){
    	$cliente=Cliente::all();
    	return view('backend.cliente.lista_cliente',compact('cliente'));
    }

    function AJAX_contactosDeCliente($id_cliente){
        $c=new Contacto(array(
            'nombre'=>'Juan',
            'apellido'=>'Perez',
        ));
        
        $clientes=[$c];

        return response()->json($clientes);
    }
}

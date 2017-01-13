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
    	$contactos=[];

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
        		array_push($contactos,$tmp_array);
                $contacto=new Contacto(array(
                    'nombre'=>$tmp_array[0],
                    'apellido'=>$tmp_array[1],
                ));
                if($tmp_array[2]!=''){
                    $contacto->email=$tmp_array[2];
                }
                if($tmp_array[3]!=''){
                    $contacto->telefono=$tmp_array[3];   
                }
                $cliente->contactos()->save($contacto);
            }
        }
    	return $cliente;
    }

    function listaDeCliente(){
    	$cliente=Cliente::all();
    	return view('backend.cliente.lista_cliente',compact('cliente'));
    }
}

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
    /*
    Función que retorna la vista de registrar contacto
    */
    function nuevoContactoForm(){
        return view('backend.cliente.registrar_contacto');
    }


    /*
    Esta función se encarga de tomas los datos enviados desde la vista y crear un objeto de tipo contacto, asignarle los valores y luego registrarlo en la base de datos.

    Luego redirecciona llamando al metodo de listaDeContactos.
    */
    function nuevoContacto(NuevoContactoRequest $r){
        $contacto=new Contacto();
        $contacto->nombre=$r->get('nombre');
        $contacto->apellido=$r->get('apellido');
        $contacto->email=$r->get('email');
        $contacto->telefono=$r->get('telefono');
        $contacto->save();
        return redirect()->action('ControladorCliente@listaDeContacto');
    }


    /*
    Este metodo retorna la vista al formulario para registrar nuevos clientes, junton con la informacion de todos los contactos en la base de datos.
    */
    function nuevoClienteForm(){
    	$contactos=Contacto::all();
        return view('backend.cliente.registrar_cliente',compact('contactos'));
    }


    /*
    Este metodo se encarga de registrar un nuevo cliente en la base de datos usando los datos que recibe desde la vista, se crea el objeto, se le asignan sus distintos valores y luego se envian a la base de datos.

    El for se encarga de para cada contacto de ese cliente (dato que también es entregado por la vista) se hace la relacion.

    retorna una vista con la lista de clientes junton con un mensaje para mostrarle al usuario que la operacion fué realizada.
    */
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


    /*
    Esta función recibe como parametro la id de un cliente, luego busca en la base de datos ese cliente y se lo asigna a una variable, luego busca la lista de contactos, y retorna una vista para editar un cliente enviandole los datos de cliente y contactos
    */
    function editarClienteForm($idCliente){
        $cliente = Cliente::find($idCliente);
        $contactos= Contacto::all();
        return view("backend.cliente.editar_cliente", compact("cliente","contactos"));
    }


    /*
    Esta funcion recibe datos de la vista de editar cliente, busca el cliente segun el id de cliente en la base de datos, luego verifica que el largo de rut sea mayor a 1, al objeto cliente se le asignan los parametros obtenidos de la vista y luego se envian a la base de datos, esto hace UPDATE de los datos de ese cliente en la base de datos.

    Luego se asocian los contactos a este cliente editado.

    Se retorna a la vista de lista de clientes junto a un mensaje.
    */
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

        $cliente->contactos()->detach();
        if($r->get('contactos')){
            foreach($r->get('contactos') as $c){
                $contacto=Contacto::find($c);
                $cliente->contactos()->save($contacto);
                
            }
        }
        
        $msj=["title" => "Registro", "text" => "Te registraste"];
        return redirect()->action('ControladorCliente@listaDeCliente')->with("mensaje", $msj);
    }


    /*
    Esta función carga todos los clientes en la base de datos, luego retorna la vista encargada de mostrar la lista de clientes y le envia los datos que tiene que mostrar.
    */
    function listaDeCliente(){
    	$clientes=Cliente::all();
    	return view('backend.cliente.lista_cliente',compact('clientes'));
    }


    /*
    Esta funcion retorna la vista a la lista de contactos junto con todos los contactos en la base de datos.
    */
    function listaDeContacto(){
        $contactos=Contacto::all();
        return view('backend.cliente.lista_contacto',compact('contactos'));
    }


    /*
    Esta función es llamada por una peticion en formato ajax, la cual envia un id de cliente
    luego la funcion busca el cliente con ese id en la base de datos, si ese cliente está entonces busca si tiene contactos asociados, si los tiene los retorna mediante json, sino, entonces retorna un json sin nada.
    */
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


    /*
    Función llamada mediante una peticion en formato ajax, este le envia una cadena, luego buscamos en la tabla cliente alguna entrada con el campo nombre o rut_cliente que contengan esta cadena.

    Se retorna el resultado usando json.
    */
    function AJAX_busquedaClientes($texto){
        $clientes=DB::table('cliente')->where('nombre','LIKE','%'.$texto.'%')->orWhere('rut_cliente','LIKE','%'.$texto.'%')->get();
        return response()->json($clientes);
    }


    /*
    Función que busca los contactos de un cliente ingresado, si se encuentra se envian los datos del cliente junton con los datos de su contacto.
    */
    function buscaContactos($rut_cliente){
        $cliente=Cliente::whereRut_cliente($rut_cliente)->first();
        if ($cliente){
            return response()->json(['cliente'=>$cliente,'contactos'=>$cliente->contactos]);
        }
    }
}

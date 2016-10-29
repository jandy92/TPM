<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NewClientRequest;
use App\Cliente;

class ClientsController extends Controller{
    function showClientesList(){
    	$clients=Cliente::all();
        return view('backend.clients.list',compact('clients'));   
    }

    function showNewClienteForm(){
    	return view('backend.clients.new');
    }

    function addNewClient(NewClientRequest $req){
    	$rut=$req->get('rut');
    	$c=new Cliente(array(
    		'rut'=>str_ireplace('.','',$rut),
    		'nombre'=>$req->get('name'),
    		'direccion'=>$req->get('adress'),
    		'giro'=>$req->get('giro'),
    		'telefono'=>$req->get('phone'),
    	));
    	$c->save();
    	return redirect()->action('ClientsController@showClientesList');
    }
}

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
    	$c=new Cliente(array(
    		'rut'=>get('rut'),
    		'nombre'=>$req->get('name'),
    		'direccion'=>$req->get('adress'),
    		'giro'=>$req->get('giro'),
    		'telefono'=>$req->get('phone'),
    	));
    	$c->save();
    	return redirect()->action('ClientsController@showClientesList');
    }
}

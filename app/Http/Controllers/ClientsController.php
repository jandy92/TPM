<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cliente;

class ClientsController extends Controller{
    function showClientesList(){
    	$contacts=Cliente::all();
        return view('backend.clients.list',compact('contacts'));   
    }

    function showNewClienteForm(){
    	return view('backend.clients.new');
    }

    function addNewContact(NewClientRequest $req){
    	$c=new Cliente(array(
    		'rut'=>$req->get('rut'),
    		'nombre'=>$req->get('name'),
    	));
    	//$c->save();
    	//return redirect()->action('ContactsController@showClientesList');
    	return $c;
    }
}

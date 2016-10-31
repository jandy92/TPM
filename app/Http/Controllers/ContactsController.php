<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NewContactRequest;

use App\Contacto;
use App\Cliente;

class ContactsController extends Controller{
    function showContactosList(){
    	$contacts=Contacto::all();
        return view('backend.contacts.list',compact('contacts'));   
    }

    function showNewContactoForm(){
        $clients=Cliente::orderBy('nombre','DESC')->get();
    	return view('backend.contacts.new',compact('clients'));
    }

    function addNewContact(NewContactRequest $req){
    	$cont=new Contacto(array(
    		'rut'=>$req->get('rut'),
    		'nombre'=>$req->get('name'),
    		'telefono'=>$req->get('phone'),
    		'email'=>$req->get('email'),
    	));
    	$cont->save();

        $clientes=$req->get('clientes');
        if($clientes){
            foreach($clientes as $c){
                $cliente=Cliente::whereRut($c)->first();
                $cliente->contactos()->attach($cont->rut);
            }
        }
    	return redirect()->action('ContactsController@showContactosList');
    }

    function showDetails($rut){
        $contact=Contacto::whereRut($rut)->first();
        return view('backend.contacts.details',compact('contact'));
    }
}

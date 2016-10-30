<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NewContactRequest;

use App\Contacto;
class ContactsController extends Controller{
    function showContactosList(){
    	$contacts=Contacto::all();
        return view('backend.contacts.list',compact('contacts'));   
    }

    function showNewContactoForm(){
    	return view('backend.contacts.new');
    }

    function addNewContact(NewContactRequest $req){
    	$c=new Contacto(array(
    		'rut'=>$req->get('rut'),
    		'nombre'=>$req->get('name'),
    		'telefono'=>$req->get('phone'),
    		'email'=>$req->get('email'),
    	));
    	$c->save();
    	return redirect()->action('ContactsController@showContactosList');
    }

    function showDetails($rut){
        $contact=Contacto::whereRut($rut)->first();
        return view('backend.contacts.details',compact('contact'));
    }
}

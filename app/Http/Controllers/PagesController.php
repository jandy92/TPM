<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Role;

class PagesController extends Controller{
    function index(){
    	return view('backend.common.index');
    }
    
    function showUsersList(){
    	$users=User::all();
    	return view('backend.users.list',compact('users'));
    }

    function showFormularioCotizacion(){
    	return view('demo.cotizacion');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;



class PagesController extends Controller{
    function index(){
    	return view('backend.common.index');
    }

    function showFormularioCotizacion(){
    	return view('demo.cotizacion');
    }
}

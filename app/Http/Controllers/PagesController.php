<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;



class PagesController extends Controller{
    function index(){
    	return view('backend.common.index');
    }

    function showFormularioCotizacion(){
    	return view('backend.cotizacion.new');
    }

    function showFormularioNuevoTrabajo(){
    	return view('backend.jobs.new');
    }

    function showTrabajosList(){
    	return view('backend.jobs.list');
    }

    function showCotizacionesList(){
        return view('backend.cotizacion.list');
    }

}

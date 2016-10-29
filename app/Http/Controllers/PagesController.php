<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NewCotizacionRequest;

use App\Cliente;
use App\Contacto;
use App\Cotizacion;
class PagesController extends Controller{
    function index(){
    	return view('backend.common.index');
    }

    function showFormularioCotizacion(){
        $clients=Cliente::orderBy('nombre')->get();
        $contacts=Contacto::all();
    	return view('backend.cotizacion.new',compact('clients','contacts'));
    }

    function crearCotizacion(NewCotizacionRequest $req){
        
        return redirect()->action('PagesController@showCotizacionesList');
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

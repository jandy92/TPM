<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\NewCotizacionRequest;
use App\Http\Requests\NewTrabajoRequest;

use App\Cliente;
use App\Contacto;
use App\Cotizacion;
use App\Trabajo;


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
        $cot=new Cotizacion(array(
            'titulo'=>$req->get('titulo'),
            'rut_contacto'=>$req->get('contacto'),
            'rut_cliente'=>$req->get('cliente'),
        ));
        $cot->save();
        return redirect()->action('PagesController@showCotizacionesList');
    }

    function showCotizacionesList(){
        $cots=Cotizacion::all();
        return view('backend.cotizacion.list',compact('cots'));
    }

    function showCotizacionDetail($folio){
        $cot=Cotizacion::whereFolio($folio)->first();
        $jobs=Trabajo::whereFolio_cotizacion($folio)->get();   
        return view('backend.cotizacion.details',compact('cot','jobs'));
    }

    function crearTrabajo(NewTrabajoRequest $req){
        $job=new Trabajo(array(
            'titulo'=>$req->get('titulo'),
            'descripcion'=>$req->get('descripcion'),
            'orden_trabajo'=>$req->get('ot'),
            'orden_compra'=>$req->get('oc'),
            'utilidad'=>$req->get('utilidad'),
            'num_factura'=>$req->get('numfac'),
        ));
        
        if($req->get('fecha_emision')!=''){
            $job->fecha_emision_cobro=$req->get('fecha_emision');
        }
        if($req->get('fecha_pago')!=''){
            $job->fecha_pago=$req->get('fecha_pago');
        }
        $cot=Cotizacion::whereFolio($req->get('folio'))->first();
        $job->cotizacion()->associate($cot);
        $job->save();

        if($req->get('returnTo')=='cot_list'){
            return redirect()->action('PagesController@showCotizacionDetail',$req->get('folio'));
        }else{
             return redirect()->action('PagesController@showTrabajosList');
        }
        //return redirect()->action('PagesController@showTrabajosList');
    }

    function showFormularioNuevoTrabajo($folio=-1){
        $cot=Cotizacion::whereFolio($folio)->first();
        if(!$cot){$folio=-1;}
        return view('backend.jobs.new',compact('folio'));
    }

    function showTrabajosList(){
        $jobs=Trabajo::all();
        return view('backend.jobs.list',compact('jobs'));
    }


}

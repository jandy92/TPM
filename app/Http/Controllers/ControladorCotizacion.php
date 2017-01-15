<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cotizacion;
use DB;
use App\Tipo_trabajo;

class ControladorCotizacion extends Controller
{
    function nuevaCotizacionForm(){
        $tipoTrab = Tipo_trabajo::all();
    	return view('backend.cotizacion.crear_cotizacion', compact("tipoTrab"));
    }

    function nuevaCotizacion(Request $r){
    	/*echo "TITULO COTIZACION= ".$r->get('titulo');
    	echo "<br/>";
    	echo "CLIENTE= ".$r->get('clientes');
    	echo "<br/>";
    	echo "CONTACTO= ".$r->get('contactos');
    	echo "<br/>";
    	echo "TIPO DE TRABAJO= ".$r->get('tiposTrab');
    	echo "<br/>";
    	echo "DESCRIPCION= ".$r->get('descTrab');
    	echo "<br/>";
    	echo "NOMBR MATERIAL= ".$r->get('nomMat');
    	echo "<br/>";
    	echo "UNIDAD MEDIDA= ".$r->get('unidMed');
    	echo "<br/>";
    	echo "CANTIDAD= ".$r->get('cantidad');
    	echo "<br/>";
    	echo "VALOR UNITARIO= ".$r->get('valorUn');
    	echo "<br/>";
    	echo "TIPO MATERIAL= ".$r->get('tiposMat');
    	echo "<br/>";
    	echo "GASTO FIJO= ".$r->get('gastoFijo');
    	echo "<br/>";
    	echo "UTILIDAD (%)= ".$r->get('utilidad');
    	echo "<br/>";*/

    	$cotizacion = new Cotizacion(array('nombre' => $r->get('titulo'),
    		'descripcion_trabajo'=> $r->get('descTrab'),
    		'rut_cliente'=> '18.008.790-7', //$r->get('descTrab'),
    		'id_contacto'=> 2,//$r->get('descTrab'),
    		'id_tipo_trabajo'=> 2,//$r->get('descTrab')
    		));

    	$cotizacion->save();
    	return "cotizacion creada!";
    }


    function listaCotizacion(){
    	return view('backend.cotizacion.lista_cotizacion');
    }
}

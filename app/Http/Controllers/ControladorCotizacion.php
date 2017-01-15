<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cotizacion;
use DB;
use App\Tipo_trabajo;
use App\Cliente;
use App\Contacto;

class ControladorCotizacion extends Controller
{
    function nuevaCotizacionForm(){
        $tipoTrab = Tipo_trabajo::all();
    	return view('backend.cotizacion.crear_cotizacion', compact("tipoTrab"));
    }

    function nuevaCotizacion(Request $r){

    	/*echo "NOMBR MATERIAL= ".$r->get('nomMat');
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
    	echo "<br/>";
*/      $cliente=Cliente::whereRut_cliente($r->get('cliente'))->first();
        $contacto = Contacto::find($r->get('contactos'));
        $tipo= Tipo_trabajo::find($r->get('tiposTrab'));

        $cotizacion = new Cotizacion(array('nombre'=>$r->get('titulo'),
            'descripcion_trabajo'=>$r->get('descTrab')
            ));
        $cotizacion->cliente()->associate($cliente);
        $cotizacion->contacto()->associate($contacto);
        $cotizacion->tipo_trabajo()->associate($tipo);

        $cotizacion->save();
        $msj=["title" => "Cotizacion", "text" => "Cotizacion registrada con éxito"];
        return redirect()->action('ControladorCotizacion@listaCotizacion')->with("mensaje", $msj);
    }


    function listaCotizacion(){
        $cotizacion=Cotizacion::all();
    	return view('backend.cotizacion.lista_cotizacion',compact("cotizacion"));
    }
}

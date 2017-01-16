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


    function busquedaCotizacion($texto){

        $cotizacion=DB::table('cotizacion')->where('folio_cotizacion','LIKE','%'.$texto.'%')->orWhere('nombre','LIKE','%'.$texto.'%')->get();

        foreach ($cotizacion as $key =>$cot) {
            $aux = Cliente::where('id_cliente','=',$cot->id_cliente)->first();
            $cot['rut_cliente']= $aux->rut_cliente;
            $aux2=Tipo_trabajo::where('id_tipo_trabajo','=',$cot->id_tipo_trabajo)->first();
            $cot['tipo_trabajo'] = $aux2->nombre;
        }

        return response()->json($cotizacion);
    }
}

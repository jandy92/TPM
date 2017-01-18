<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cotizacion;
use DB;
use App\Tipo_trabajo;
use App\Cliente;
use App\Contacto;
use App\Item;
use App\Tipo_item;
use App\Unidad_medida;

class ControladorCotizacion extends Controller
{
    function nuevaCotizacionForm(){
        $tipoTrab = Tipo_trabajo::all();
        $unid = Unidad_medida::all();
    	return view('backend.cotizacion.crear_cotizacion', compact("tipoTrab","unid"));
    }

    function previewPdf($id){
        $cotizacion=Cotizacion::find(1);
        return view('backend.pdf.pdf_cotizacion_v2', compact('cotizacion'));
    }

    function nuevaCotizacion(Request $r){
        

        $cliente=Cliente::whereRut_cliente($r->get('cliente'))->first();
        $contacto = Contacto::find($r->get('contactos'));
        $tipo= Tipo_trabajo::find($r->get('tiposTrab'));

        $cotizacion = new Cotizacion(array('nombre'=>$r->get('titulo'),
            'descripcion_trabajo'=>$r->get('descTrab'),
            'gasto_fijo'=>$r->get('gastoFijo'),
            'utilidad'=>$r->get('utilidad')
            ));
        $cotizacion->cliente()->associate($cliente);
        $cotizacion->contacto()->associate($contacto);
        $cotizacion->tipo_trabajo()->associate($tipo);
        $cot = $cotizacion;
        $cotizacion->save();

        foreach ($r->get('items') as $item) {
            $tip=Tipo_item::whereNombre($item['tipo'])->first();
            $un =Unidad_medida::whereNombre_abreviacion($item['unidad'])->first();
            
            $it=new Item(array('nombre'=>$item['nombre'],
                'unidad_medida'=>$item['unidad'],
                'id_tipo_item'=>$tip->id_tipo_item,
                'id_unidad'=>$un->id_unidad
                ));
            $it->tipo_item()->associate($tip);

            $it->save();
            $cotizacion->items()->attach($it,['cantidad'=>$item['cantidad'],'precio_unitario'=>$item['valor']]);
            
        }


        $msj=["title" => "Cotizacion", "text" => "Cotizacion registrada con éxito"];
        return redirect()->action('ControladorCotizacion@listaCotizacion')->with("mensaje", $msj);
    }


    function listaCotizacion(){
        $cotizacion=Cotizacion::all();
        /*if(empty($cotizacion[1]->trabajo)){
    	   return "no tiene trabajo";
        }else{
            return "si tiene trabajo";
        }*/
        return view('backend.cotizacion.lista_cotizacion',compact("cotizacion"));
    }


    function busquedaCotizacion($texto){

        $cotizacion=Cotizacion::whereHas('contacto',function($q) use($texto){
            $q->where('nombre','like','%'.$texto.'%');
        })->orWhereHas('cliente',function($q) use($texto){
            $q->where('nombre','like','%'.$texto.'%');}
        )->orWhere('nombre','like','%'.$texto.'%')->orWhere('folio_cotizacion','like','%'.$texto.'%')->get();


        foreach ($cotizacion as $key => $cot) {
            $aux = Cliente::where('id_cliente','=',$cot->id_cliente)->first();
            $cot['nombre_cliente'] = $aux->nombre;
            $aux2 = Contacto::where('id_contacto','=',$cot->id_contacto)->first();
            $cot['nombre_contacto']=$aux2->nombre;
            $cot['apellido_contacto']=$aux2->apellido;
            $aux3= Tipo_trabajo::where('id_tipo_trabajo','=',$cot->id_tipo_trabajo)->first();
            $cot['nombre_tipo_trabajo']=$aux3->nombre;
            if(empty($cot->trabajo)){
                $cot['con_trabajo']=false;
            }else{
                $cot['con_trabajo']=true;
            }
        }

        return response()->json($cotizacion);
    }

    function pdfCotizacionForm(){
        $cotizacion=Cotizacion::find(1);
        return view('backend.pdf.pdf_cotizacion_v2', compact('cotizacion'));
    }
    function editarCotizacionForm($folio_cotizacion){
        $cotizacion=Cotizacion::find($folio_cotizacion);
        $cliente=Cliente::find($cotizacion->id_cliente);
        $tipo_trabajo = Tipo_trabajo::all();
        return view('backend.cotizacion.editar_cotizacion', compact('cotizacion','cliente','tipo_trabajo'));
    }
}

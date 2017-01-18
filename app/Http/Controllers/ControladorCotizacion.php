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
    /*
    En esta funciona se le asignan todos los datos de Tipo_trabajo y Unidad_medida a 2 variables
    para luego retornar una vista, la vista de crear cotización nueva juntos con todos los datos
    guardado en las variables para que la vista pueda usar esos datos desde el comienzo
    */
    function nuevaCotizacionForm(){
        $tipoTrab = Tipo_trabajo::all();
        $unid = Unidad_medida::all();
    	return view('backend.cotizacion.crear_cotizacion', compact("tipoTrab","unid"));
    }


    /*
    Metodo usado durante la implementacion del archivo pdf generado por el sistema,
    este metodo carga la vista previa de lo que mostraria al generar el documento.
    */
    function previewPdf($id){
        $cotizacion=Cotizacion::find(1);
        return view('backend.pdf.pdf_cotizacion_v2', compact('cotizacion'));
    }


    /*
     Este metodo se ejecuta al crear una nueva cotizacion, mediante el Request obtiene los datos desde la vista, con $r->('parametro') se pueden obtener los diferentes parametros obtenidos.

     Primero se asigna a la variable $cliente, $contacto y $tipo un objeto de su tipo correspondiente que coincida con la consulta realizada, luego se crea un objeto de tipo Cotizacion y se le asigan los parametros que este requiere, con las funciones "associate" se crean las relaciones necesarias entre objetos luego se hace la insercion de los datos en la tabla cotizacion.

     El for recorre cada uno de los "items" recibidos desde la vista y va creando un objeto con sus parametros, realiza las asociaciones y los envia a la base de datos.

     el return llama a un controlador que se encarga de cargar la vista con la lista de cotizaciones junton a un mensaje de que la cotizacion se ha realizado con éxito.
    */
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


    /*
    Esta funcion toma toda lista de cotizaciones en la base de datos, se la asigna a una variable y retorna una vista junto con esta variable con la colección de datos para que esta los pueda trabajar.
    */
    function listaCotizacion(){
        $cotizacion=Cotizacion::all();
        return view('backend.cotizacion.lista_cotizacion',compact("cotizacion"));
    }


    /*
    Esta función se encarga de buscar cotizaciones en la base de datos segun el parametro que recibe, busca las cotizaciones donde el nombre de contacto o nombre de cliente o el folio de la cotizacion coinciden con el parametro ingresado y se asigna esa coleccion a la variable $cotizacion.

    El for le agrega parametros extras a cada elemento de esta para luego enviar esta coleccion a la vista mediante JSON
    */
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


    /*
    Función utilizada tambien para ver una vista previa del documento PDF que generará el sistema.
    */
    function pdfCotizacionForm(){
        $cotizacion=Cotizacion::find(1);
        return view('backend.pdf.pdf_cotizacion_v2', compact('cotizacion'));
    }


    /*
    Esta función recibe un numero de folio para obtener los datos de esa cotizacion en particular
    para luego retornar la vista que contiene el formulario para editar una cotizacion junto con los datos de esa cotizacion para que la vista los utilice.
    */
    function editarCotizacionForm($folio_cotizacion){
        $cotizacion=Cotizacion::find($folio_cotizacion);
        $cliente=Cliente::find($cotizacion->id_cliente);
        $tipo_trabajo = Tipo_trabajo::all();
        return view('backend.cotizacion.editar_cotizacion', compact('cotizacion','cliente','tipo_trabajo'));
    }
}

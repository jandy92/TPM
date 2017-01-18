<?php

namespace App\Http\Controllers;
use App\Cotizacion;

use Illuminate\Http\Request;

class PdfController extends Controller
{

	/*
	##################IMPORTANTE#############
	Para implementar esta funcion fue necesaria la instalacion de una libreria
	extra, la utilizada es DomPDF se puede encontrar su documentacion en su
	github oficial: https://github.com/dompdf/dompdf
	#########################################


	Esta funcion es la encargada de generar un documento PDF,
	como parametro recibe un numero de folio de una cotización, 
	se busca en la base de datos y se asigna esa entrada a la variable $cotizacion.

	A la  variable $url se le da la ubicacion de la plantilla para generar PDF en 
	formato htlm.

	$view se encarga de generar y renderizar la plantilla entregada en una vista
	$pdf se encarga de cargar la vista entregada y crear el documento como tal, 
	la funcion download() contiene el nombre con el cual se genera el documento
	y lo descarga en el navegador.
	*/
    function crearPDF($folio_cotizacion){
    	$cotizacion = Cotizacion::find($folio_cotizacion);
    	$url = ".backend.pdf.pdf_cotizacion_v2";
    	
    	$view = \View::make($url,compact('cotizacion'))->render();
    	$pdf = \App::make('dompdf.wrapper');
    	$pdf -> loadHTML($view);

    	return $pdf->download($folio_cotizacion.'_'.$cotizacion->nombre.'_'.$cotizacion->cliente->nombre.'.pdf');
    }
}

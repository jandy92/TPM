<?php

namespace App\Http\Controllers;
use App\Cotizacion;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    function crearPDF($folio_cotizacion){
    	$cotizacion = Cotizacion::find($folio_cotizacion);
    	$url = "pdf.nombre de vista";
    	$view = \View::make($url,compact('cotizacion'))->render();
    	$pdf = \App::make('dompdf.wrapper');
    	$pdf -> loadHTML($view);

    	return $pdf->download('Cotizacion_xx.pdf');
    }
}

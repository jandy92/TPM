<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ControladorTrabajo extends Controller
{
	function nuevoTrabajoForm(){
    	return view('backend.trabajo.formulario_trabajo');
    }
    //
}

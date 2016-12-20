<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {return view('welcome');});
Route::get('/', 'ControladorPaginas@home');
Route::get('/cliente/nuevo', 'ControladorCliente@nuevoClienteForm');
<<<<<<< HEAD
Route::get('/cotizacion/nueva', 'ControladorCotizacion@nuevaCotizacionForm');
=======
Route::get('/trabajo/nuevo', 'ControladorTrabajo@nuevoTrabajoForm');
>>>>>>> d0bbb970b84644afb744f4e3b96bb15923110ebe

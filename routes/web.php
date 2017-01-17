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

Route::group(['middleware'=>['checklog','web']],function(){

	Route::group(['prefix' => 'cliente','middleware'=>['filtro_user']],function(){
		Route::get('/nuevo', 'ControladorCliente@nuevoClienteForm');
		Route::post('/nuevo', 'ControladorCliente@nuevoCliente');
		Route::get('/lista', 'ControladorCliente@listaDeCliente');
		Route::get('/{id}/edit','ControladorCliente@editarClienteForm');
		Route::post('/{id}/edit','ControladorCliente@editarCliente');
	});

	Route::group(['prefix' => 'contacto','middleware'=>['filtro_user']],function(){
		Route::get('/nuevo', 'ControladorCliente@nuevoContactoForm');
		Route::post('nuevo', 'ControladorCliente@nuevoContacto');
		Route::get('/lista', 'ControladorCliente@listaDeContacto');
		Route::get('/{id}/editar', 'ControladorContacto@editarContactoForm');
		Route::post('/{id}/editar', 'ControladorContacto@editarContacto');	
	});

	Route::group(['prefix' => 'trabajo','middleware'=>['filtro_user']],function(){
		Route::get('/{id}/nuevo', 'ControladorTrabajo@nuevoTrabajoForm');
		Route::post('/{id}/nuevo', 'ControladorTrabajo@nuevoTrabajo');
		Route::get('/{id}/editar', 'ControladorTrabajo@editarTrabajoForm');
		Route::post('/{id}/editar', 'ControladorTrabajo@editarTrabajo');	
	});
	
	Route::group(['prefix' => 'cotizacion','middleware'=>['filtro_user']],function(){
		Route::get('/nueva', 'ControladorCotizacion@nuevaCotizacionForm');
		Route::get('/lista', 'ControladorCotizacion@listaCotizacion');
		Route::post('/nueva','ControladorCotizacion@nuevaCotizacion');	
		Route::get('/pdf','ControladorCotizacion@pdfCotizacionForm');
		Route::get('/{id}/editar','ControladorCotizacion@editarCotizacionForm');
	});

	Route::group(['prefix' => 'tipoTrabajo','middleware'=>['filtro_user']],function(){
		Route::get('/', 'ControladorTipoTrabajo@tipoTrabajoForm');
		Route::post('', 'ControladorTipoTrabajo@nuevoTipoTrabajo');
		Route::get('/{id}/editar', 'ControladorTipoTrabajo@editarTipoTrabajoForm');
		Route::post('/{id}/editar', 'ControladorTipoTrabajo@editarTipoTrabajo');
	});

	Route::group(['prefix' => 'administracion/usuario','middleware'=>['filtro_admin']],function(){
		Route::get('/lista','ControladorUsuario@listaUsuario');
		Route::get('/nuevo','ControladorUsuario@nuevoUsuarioForm');
		Route::post('/nuevo','ControladorUsuario@crearNuevoUsuario');
		Route::get('/activar/{id}','ControladorUsuario@activarUsuario');		
		Route::get('/borrar/{id}','ControladorUsuario@borrarUsuario');
		Route::get('/editar/{id}','ControladorUsuario@editarUsuarioForm');
		Route::post('/editar/{id}','ControladorUsuario@editarUsuario');
	});
	Route::group(['prefix' => 'administracion/varios','middleware'=>['filtro_admin']],function(){
		Route::get('/unidadMedida','ControladorVarios@unidades_de_medida_lista');
		Route::post('/unidadMedida','ControladorVarios@nuevo_unidad_medida');
	
	});

	Route::get('/', 'ControladorPaginas@home');
	Route::get('/home', 'HomeController@index');

	$this->get('/logout', 'Auth\LoginController@logout');
});

Route::get('API/buscarContacto/{texto}','ControladorContacto@buscarContacto');
Route::get('pdf/{folio}','PdfController@crearPDF');
Route::get('API/buscarCliente/{rut_cliente}','ControladorCliente@buscaContactos');
Route::get('API/contactosDeCliente/{id}','ControladorCliente@AJAX_contactosDeCliente');
Route::get('API/buscarclientes/{texto}','ControladorCliente@AJAX_busquedaClientes');
Route::get('API/buscaCotizacion/{texto}','ControladorCotizacion@busquedaCotizacion');

Route::get('/activar/{token}','ControladorUsuario@activarUsuarioToken');
Route::post('/activar/{token}','ControladorUsuario@activarUsuarioTokenFinal');

$this->get('/login', 'Auth\LoginController@showLoginForm');
$this->post('/login', 'Auth\LoginController@login');
//Auth::routes();

Route::get('/test',function(){
	return view('test');
});
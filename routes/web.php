<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Para rutas dentro del siguiente grupo se llamará al middleware check_login
//si el usuario esta logueado continúa, de otro modo, se enviará a la pantalla de login
route::group(['middleware'=>'check_login'],function(){
	Route::get('/','PagesController@index');

	Route::get('/me/details/','UsersController@showCurrentUserInfo');
	Route::get('/me/edit/','UsersController@showCurrentUserEditForm');
	Route::post('/me/edit/','UsersController@selfEditUser');

	Route::get('/security/roles_and_permissions/','RolesPermissionsController@showTable');
	Route::get('/security/role/{name}/edit','RolesPermissionsController@showRoleEditForm');

	Route::group(['middleware'=>['permission:admin_users']],function(){
		Route::get('/users/list','UsersController@showUsersList');
		Route::get('/user/new','UsersController@showNewUserForm');
		Route::post('/user/new','UsersController@addNewUser');
		Route::get('/user/{u}/edit/','UsersController@showEditUserForm');
		Route::post('/user/{u}/edit/','UsersController@editUser');
		Route::get('/user/{u}/delete/','UsersController@delUser');
		Route::get('/user/{u}/details/','UsersController@showUserInfo');
	});



	Route::group(['middleware'=>['permission:admin_trab']],function(){
		Route::get('/jobs/new','PagesController@showFormularioNuevoTrabajo');
		Route::get('/jobs','PagesController@showTrabajosList');

	});
	Route::group(['middleware'=>['permission:admin_cot']],function(){
		Route::get('/cots/new','PagesController@showFormularioCotizacion');
		Route::get('/cots','PagesController@showCotizacionesList');
	});

	//contactos y clientes
	Route::group(['middleware'=>['permission:admin_clicont']],function(){
		Route::get('/contacts','ContactsController@showContactosList');
		Route::get('/contacts/new','ContactsController@showNewContactoForm');
		Route::post('/contacts/new','ContactsController@addNewContact');

		Route::get('/clients','ClientsController@showClientesList');
		Route::get('/clients/new','ClientsController@showNewClienteForm');
		Route::post('/clients/new','ClientsController@addNewClient');	
	});


});
route::get('/login','Auth\LoginController@showLoginForm');
route::post('/login','Auth\LoginController@login');
route::get('logout','Auth\LoginController@logout');

/*	plantilla grupo de rutas
	Route::group([],function(){
	});
*/
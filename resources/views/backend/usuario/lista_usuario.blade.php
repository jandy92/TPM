@extends('master')
@section('titulo','Lista de usuarios')
@section('contenido')
<div class="container">
	<div class="col">
		<a href="{{action('ControladorUsuario@nuevoUsuarioForm')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Registrar nuevo usuario</a>
	</div>
	<div class="well">
		<legend>Lista de usuarios registrados</legend>
		<div class="table-responsive">
			@if(isset($usuarios))
			<table class="table">
				<thead>
					<th>ID</th>
					<th>Nombre</th>
					<th>Rol</th>
					<th>E-mail</th>
					<th>Estado</th>
					<th>Acciones</th>
				</thead>
				<tbody>
				@foreach($usuarios as $u)
					<tr>
						<th>{{$u->id}}</th>
						<th>{{$u->name}}</th>
						<th>
							@foreach($u->roles as $rol)
								{{$rol->display_name}}
							@endforeach
						</th>
						<th>{{$u->email}}</th>
						<th>
							@if($u->activado==1)
							<span style="color:green">activado</span>
							@else
							<span style="color:red">desactivado</span>
							@endif
						</th>
						<th>
							@if($u->activado==0)
							<a href="{{action('ControladorUsuario@activarUsuario',$u->id)}}" style="color:green;">Activar</a>
							@endif
							<a href="#" style="color:blue;">Detalles</a>
							<a href="#" style="color:orange;">Editar</a>
							
							<a href="{{action('ControladorUsuario@borrarUsuario',$u->id)}}" style="color:red;">Borrar</a>
						</th>
					</tr>
				@endforeach
				</tbody>
			</table>
			@else
				<p class="alert alert-danger"">Problema al obtener lista de usuarios, contacte con el administrador!</p>
			@endif
		</div>
	</div>
</div>
@endsection
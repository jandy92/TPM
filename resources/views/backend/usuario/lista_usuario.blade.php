@extends('master')
@section('titulo','Lista de usuarios')
@section('contenido')
<div class="container">
	<div class="col">
		<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Registrar nuevo usuario</a>
	</div>
	<div class="well">
		<legend>Lista de usuarios registrados</legend>
		<div class="table-responsive">
			@if(isset($usuarios))
			<table class="table">
				<thead>
					<th>ID</th>
					<th>Nombre</th>
					<th>E-mail</th>
					<th>Acciones</th>
				</thead>
				<tbody>
				@foreach($usuarios as $u)
					<tr>
						<th>{{$u->id}}</th>
						<th>{{$u->name}}</th>
						<th>{{$u->email}}</th>
						<th>
							<a href="#" style="color:green;">Detalles</a>
							
							<a href="#" style="color:orange;">Editar</a>
							
							<a href="#" style="color:red;">Borrar</a>
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
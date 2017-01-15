@extends('master')
@section('titulo','Lista de contactos')
@section('contenido')
<div class="container">
	<div class="well">
		<legend>Lista de contactos</legend>
		@if(isset($contactos)&&!$contactos->isEmpty())
			<table class="table table-hover table-striped table-condensed table-responsive  ">
				<thead>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Email</th>
					<th>Teléfono</th>
					<th></th>
				</thead>
				<tbody>
				<form >
				<input class="form-control" placeholder="Buscar..." type="search" name="filtro" id="filtro">
				</form>
					@foreach($contactos as $cont)
					<tr>
						<td>{{$cont->nombre}}</td>
						<td>{{$cont->apellido}}</td>
						<td>{{$cont->email}}</td>
						<td>{{$cont->telefono}}</td>
						<td>
							<a class="btn btn-link" style="color:green" href="#">Editar</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			No existen contactos registrados
		@endif
	</div>
</div>
@endsection
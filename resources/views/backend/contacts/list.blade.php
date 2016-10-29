@extends('master')
@section('title','Lista de contactos')
@section('content')

<div class="container">
	<div class="col">
		<a href="{{action('ContactsController@showNewContactoForm')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar nuevo contacto</a>
	</div>
	<div class="well">
		<legend>Lista de contactos registrados</legend>
		@if(isset($contacts)&&!$contacts->isEmpty())
			<table class="table table-hover table-striped table-condensed table-responsive  ">
				<thead>
					<th>R.U.T</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Teléfono</th>
					<th>Clientes</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($contacts as $con)
					<tr>
						<td>{{$con->rut}}</td>
						<td>{{$con->nombre}}</td>
						<td>{{$con->email}}</td>
						<td>{{$con->telefono}}</td>
						<td>NOT_YET</td>
						<td>
							<a class="btn btn-warning" href="#">informacion</a>
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
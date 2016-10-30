@extends('master')
@section('title','Lista de clientes')
@section('content')

<div class="container">
	<div class="col">
		<a href="{{action('ClientsController@showNewClienteForm')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar nuevo cliente</a>
	</div>
	<div class="well">
		<legend>Lista de clientes registrados</legend>
		@if(isset($clients)&&!$clients->isEmpty())
			<table class="table table-hover table-striped table-condensed table-responsive  ">
				<thead>
					<th>R.U.T</th>
					<th>Nombre</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Giro</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($clients as $cli)
					<tr>
						<td>{{$cli->rut}}</td>
						<td>{{$cli->nombre}}</td>
						<td>{{$cli->direccion}}</td>
						<td>{{$cli->telefono}}</td>
						<td>NOT_YET</td>
						<td>
							<a class="btn btn-warning" href="#">informacion</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			No existen clientes registrados
		@endif
	</div>
</div>
@endsection
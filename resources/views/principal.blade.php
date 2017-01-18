@extends('master')
@section('titulo','Pagina principal')
@section('contenido')


<div class="container">
<h2>Bienvenido, {{Auth::user()->name}}.</h2>
@if(Auth::user()->hasRole('admin'))
	<div class="well well-lg">
		<legend>Resumen administrador</legend>
		<div>
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>Usuarios registrados</th>
					<td>0</td>
				</tr>
				<tr>
					<th>Nuevos mensajes</th>
					<td>0</td>
				</tr>
			</table>
		</div>
	</div>
@endif
@if(Auth::user()->hasRole('user'))
	<div class="well well-lg">
		<legend>Resumen usuario</legend>
		<div>
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>Cotizaciones pendientes</th>
					<td>{{$cont}}</td>
				</tr>
			</table>
		</div>
	</div>
@endif
@if(Auth::user()->hasRole('cont'))
	
@endif
</div>	
@endsection
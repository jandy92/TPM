@extends('master')
@section('title','Lista de Cotizaciones')
@section('content')
<div class="container">
	<div class="col">
		<a href="{{action('PagesController@showFormularioCotizacion')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Crear nueva cotización</a>
	</div>
	<div class="well well-lg-8-push-2">
		<legend>Lista de cotizaciones</legend>
		@if(isset($cots)&&!$cots->isEmpty())
			<table class="table table-responsive">
				<thead>
					<th>Título</th>
					<th>Cliente</th>
					<th>Contacto</th>
					<th>Creación</th>
					<th>Última modificación</th>
				</thead>
				<tbody>
					@foreach($cots as $cot)
						<tr>
							<td>{{$cot->titulo}}</td>
							<td>NOT_YET</td>
							<td>{{$cot->rut_contacto}}</td>
							<td>{{$cot->created_at}}</td>
							<td>{{$cot->updated_at}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			No existen cotizaciones registradas
		@endif
	</div>
</div>
@endsection
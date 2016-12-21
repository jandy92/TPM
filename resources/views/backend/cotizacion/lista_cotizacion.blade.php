@extends('master')
@section('titulo','Lista de Cotizaciones')
@section('contenido')

<div class="container">
	<div class="col">
		<a href="{{action('ControladorCotizacion@nuevaCotizacionForm')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Crear nueva cotización</a>
	</div>
	<div class="well well-lg-8-push-2">
		<legend>Lista de cotizaciones</legend>
	<div class="table-responsive">
		@if(isset($cots)&&!$cots->isEmpty())
			<table class="table table-responsive table-bordered">
				<thead>
					<th>N° Folio</th>
					<th>Título</th>
					<th>Cliente</th>
					<th>Tipo de trabajo</th>
					<th>Detalle</th>
					<th>PDF</th>
					<th>Aceptar Cotización</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($cots as $cot)
						<tr>
							<!-- Aquí hacer algo -->
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@else
			No existen cotizaciones registradas
		@endif
	</div>
</div>
@endsection
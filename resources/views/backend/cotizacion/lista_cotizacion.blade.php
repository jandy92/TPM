@extends('master')
@section('titulo','Lista de Cotizaciones')
@section('contenido')
<script type="text/javascript">
	var cotizaciones_filtradas=[];
	var cotizaciones=[];
</script>

<div class="container">
	<div class="col">
		<a href="{{action('ControladorCotizacion@nuevaCotizacionForm')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Crear nueva cotización</a>
	</div>
	<div class="well well-lg-8-push-2">
		<legend>Lista de cotizaciones</legend>
	<div class="table-responsive">
		@if(isset($cotizacion)&&!$cotizacion->isEmpty())
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
				<tbody id="tbody">
				<form >
				<input class="form-control" placeholder="filtrar por nombre o rut" type="search" name="filtro" id="filtro">
				</form>

					@foreach($cotizacion as $cot)
					<script type="text/javascript">
						tmp_c={
							folio_cotizacion:"{{$cot->folio_cotizacion}}",
							titulo:"{{$cot->nombre}}",
							cliente:"{{$cot->id_cliente}}",
							tipo_trabajo:"{{$cot->id_tipo_trabajo}}",
							detalle:"{{$cot->descripcion_trabajo}}",
							pdf:"NADA",
							aceptar: "ACEPTAR",
						};
						cotizaciones.push(tmp_c);
					</script>
					<tr>
						<td>{{$cot->folio_cotizacion}}</td>
						<td>{{$cot->nombre}}</td>
						<td>{{$cot->id_cliente}}</td>
						<td>{{$cot->id_tipo_trabajo}}</td>
						<td>{{$cot->descripcion_trabajo}}</td>
						<td> PDF</td>>
						<td> ACEPTAR </td>
						<td>
							<a class="btn btn-link" style="color:green" href="#">Editar</a>
							<a class="btn btn-link" style="color:blue" href="#">Informacion</a>
						</td>
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
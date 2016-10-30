@extends('master')
@section('title','Detalles cotizacion')
@section('content')
<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			Detalles <span class="pull-right" style="font-weight: bold;">N° folio: {{sprintf("%015d",$cot->folio)}}</span>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered ">
					<thead>
						<th>Título cotización</th>
						<th>Cliente</th>
						<th>Contacto</th>
						<th>Fecha creación</th>
						<th>Fecha última actualizado</th>
					</thead>
					<tbody>
						<tr>
							<td><strong>{{$cot->titulo}}</strong></td>
							<td>{{$cot->rut_cliente}}</td>
							<td>{{$cot->rut_contacto}}</td>
							<td>{{$cot->created_at}}</td>
							<td>{{$cot->updated_at}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading">Trabajos asociados</div>
		<div class="panel-body">
			NOT_YET
		</div>
	</div>

</div>
@endsection
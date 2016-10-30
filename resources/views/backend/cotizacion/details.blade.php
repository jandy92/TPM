@extends('master')
@section('title','Detalles cotizacion')
@section('content')
<div class="container">
	<div class="panel panel-info ">
		<div class="panel-heading">
			<span id="info-panel-button " class="btn btn-default" data-toggle="collapse" data-target="#info-panel-body">Detalles</span>
			<span class="pull-right" style="font-weight: bold;">N° folio: {{sprintf("%015d",$cot->folio)}}</span>
		</div>
		
		<div class="panel-body collapse in" id="info-panel-body">
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
		<div class="panel-heading">
			<span class="btn btn-default" data-toggle="collapse" data-target="#trabajos-panel-body" >Trabajos asociados</span>
		</div>
		<div class="panel-body collapse in" id="trabajos-panel-body">
			@if($jobs->isEmpty())
			No existen trabajos asociados a esta cotización.
			@else
				<div class="table-responsive">
					<table class="table">
						<thead>
							<th>Título</th>
							<th>Descripción</th>
							<th>Estado</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($jobs as $job)
							<tr>
								<td>{{$job->titulo}}</td>
								<td>{{$job->descripcion}}</td>
								<td>NOT_YET</td>
								<td><a class="btn btn-primary" href="#">Detalles...</a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			@endif
			<div class="col col-lg-12">
			<a class="btn btn-primary" 
			href="{{action('PagesController@showFormularioNuevoTrabajo',['folio'=>'1'])}}"
			>
			Agregar un nuevo trabajo a esta cotización</a>
			</div>
		</div>
	</div>

</div>
@endsection
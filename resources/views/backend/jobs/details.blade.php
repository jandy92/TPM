@extends('master')
@section('title','Detalles del trabajo')
@section('content')
<div class="container">
<legend>Detalles de trabajo</legend>
	<div class="col col-lg-12 col-lg-push-0">
	<div class="col col-lg-12">
		<div class="panel panel-info">
			<div class="panel-heading">
			<span id="info-panel-button " class="btn btn-default" data-toggle="collapse" data-target="#info-panel-body">Información</span>
			</div>
			<div class="panel-body collapse in" id="info-panel-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<th>ID</th>
							<th>Título</th>
							<th>Descripción</th>
							<th>Estado</th>
							<th>Cotización asociada</th>
							<th>N° factura</th>
							<th>OT</th>
							<th>Orden de compra</th>
							<th>Utilidad</th>
							<th>Fecha emisión cobro</th>
							<th>Fecha pago</th>
							<th>Fecha creacion</th>
							<th>Fecha última modificación</th>
						</thead>
						<tbody>
							<tr>
								<td>{{$job->id}}</td>
								<td>{{$job->titulo}}</td>
								<td>
								{{$job->descripcion}}
								</td>
								<td>
									@if($job->estado)
									{{$job->estado->nombre}}
									@else
									<td>
									Sin estado asignado
									@endif
								</td>
								<td>{{$job->folio_cotizacion}}</td>
								<td>{{$job->num_factura}}</td>
								<td>{{$job->orden_trabajo}}</td>
								<td>{{$job->orden_compra}}</td>
								<td>{{$job->utilidad}}%</td>
								<td>{{$job->fecha_emision_cobro}}</td>
								<td>{{$job->fecha_pago}}</td>
								<td>{{$job->created_at}}</td>
								<td>{{$job->updated_at}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col col-lg-9">	
		<div class="panel panel-success">
			<div class="panel-heading">Items</div>
			<div class="panel-body">
				<div class="table-responsive" style="max-height:150px">
				<table class="table" >
					<thead>
						<th>Nombre</th>
						<th>Unidad de medida</th>
						<th>Precio unitario</th>
						<th>Cantidad</th>
						<th>Total por item</th>
						<th></th>
					</thead>
					<?php
						$suma_total=0;
					?>
					@foreach($job->items as $i)
					<?php
						$total_item=$i->precio_unitario*$i->cantidad;
						$suma_total+=$total_item;
					?>
					<tr>
						<td>{{$i->nombre}}</td>
						<td>{{$i->unidad_medida}}</td>
						<td>${{$i->precio_unitario}}</td>
						<td>{{$i->cantidad}}</td>
						<td>${{$total_item}}</td>
						<td>
								<div class="col-lg-6">
									<a class="btn btn-warning" href="#">Modificar</a>
								</div>
								<div class="col-lg-6">
									<a class="btn btn-danger" href="#">Eliminar</a>
								</div>
						</td>
					</tr>
					@endforeach
					<!--th></th>
					<th></th>
					<th></th>
					<th class="success">Total:</th>
					<th class="success">${{$suma_total}}</th-->
				</table>
				</div>
				<div class="col col-lg-6">
				<a class="btn btn-success" href="{{action('PagesController@showNewItemForm',$job->id)}}">Agregar nuevo item</a>
				</div>
				<div class="col col-lg-6">
				<span class="pull-right"><b>Total: ${{$suma_total}}</b></span>
				</div>
			</div>
		</div>
	</div>
	<div class="col col-lg-3">
		<div class="panel panel-warning">
			<div class="panel-heading">Opciones</div>
			<div class="panel-body">
			<!-- arreglar en el futuro! -->
				<div class="col">
					<a class="btn btn-warning " style="width: 100%;display: block;" href="#">Modificar trabajo</a>
				</div> 
				<div class="col">&nbsp;</div>
				<div class="col">
					<a class="btn btn-primary " style="width: 100%;display: block;" href="{{action('PagesController@showCotizacionDetail',$job->cotizacion->folio)}}">Volver a cotización</a>
				</div>
			</div>
		</div>
		
	</div>
	</div>
</div>
@endsection
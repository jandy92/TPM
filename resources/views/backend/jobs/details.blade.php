@extends('master')
@section('title','Detalles del trabajo')
@section('content')
<div class="container">
	<div class="col col-lg-10 col-lg-push-1">
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
								<td>{{$job->descripcion}}</td>
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

		<div class="panel panel-success">
			<div class="panel-heading">Items</div>
			<div class="panel-body">
				<div class="table-responsive">
				<table class="table">
					<thead>
						<th>Nombre</th>
						<th>Unidad de medida</th>
						<th>Precio unitario</th>
						<th>Cantidad</th>
						<th>Total por item</th>
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
						<th>{{$i->nombre}}</th>
						<th>{{$i->unidad_medida}}</th>
						<th>${{$i->precio_unitario}}</th>
						<th>{{$i->cantidad}}</th>
						<th>${{$total_item}}</th>
					</tr>
					@endforeach
					<th>					<a class="btn btn-success" href="{{action('PagesController@showNewItemForm',$job->id)}}">Agregar nuevo item</a></th>
					<th></th>
					<th></th>
					<th class="success">Total:</th>
					<th class="success">${{$suma_total}}</th>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
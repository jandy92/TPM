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

	<div class="panel panel-success">
		<div class="panel-heading">
			<span class="btn btn-default" data-toggle="collapse" data-target="#trabajos-panel-body" >Trabajos asociados</span>
		</div>
		<div class="panel-body collapse in" id="trabajos-panel-body">
			@if($jobs->isEmpty())
			No existen trabajos asociados a esta cotización.
			@else
				<?php 
					$suma_total=0;
				?>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<th>Título</th>
							<th>Descripción</th>
							<th>Items asignados</th>
							<th>Estado</th>
							<th>Total pot item</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($jobs as $job)
							<tr>
								<?php
									$suma_parcial=0;
									foreach($job->items as $i){
										$suma_parcial+=$i->cantidad*$i->precio_unitario;
									}
									$suma_total+=$suma_parcial;
								?>
								<td>{{$job->titulo}}</td>
								<td>
								@if(strlen($job->descripcion)>25)
								<span data-toggle="tooltip" title="descripción: {{$job->descripcion}}" >{{substr($job->descripcion,0,25)}}...<span>
								@else
								{{$job->descripcion}}
								@endif
								</td>
								<td>{{$job->items->count()}}</td>
								<td>NOT_YET</td>
								<td>${{$suma_parcial}}</td>
								<td>
									<a class="btn btn-warning" href="{{action('PagesController@showTrabajoDetail',$job->id)}}">Detalles
									</a>
									<button class="btn btn-danger" onclick="confirmar({{$job->id}})">Eliminar</button>
									<!--a class="btn btn-danger" href="{{action('PagesController@deleteTrabajo',$job->id)}}">Eliminar</a-->
								</td>
							</tr>
							@endforeach
							<tr>
								<th></th>
								<th></th>
								<th></th>
								<th class="success">Total</th>
								<th class="success">${{$suma_total}}</th>
							</tr>
						</tbody>
					</table>
				</div>
			@endif
			<div class="col col-lg-12">
			<a class="btn btn-success" 
			href="{{action('PagesController@showFormularioNuevoTrabajo',['folio'=>$cot->folio])}}"
			>
			Agregar un nuevo trabajo a esta cotización</a>
			</div>
		</div>
	</div>
	<div class="form-group">
		<a class="btn btn-primary" href="">Volver a lista de cotizaciones</a>
	</div>
</div>
<script type="text/javascript">
	function confirmar(id){
		var target="{{action('PagesController@deleteTrabajo','job_id')}}";
		target=target.replace('job_id',id);
		bootbox.confirm({ 
		  size: "medium",
		  title:"Eliminar trabajo",
		  message: "<h5>Está seguro que desea eliminar el trabajo seleccionado?"
		  			+"<br><font color='red'>Esta acción será <b>irreversible</b></font>.</h5>", 
		  buttons:{
		  	'cancel':{label:'cancelar y conservarlo',className:'btn btn-success pull-left'},
		  	'confirm':{label:'Si, eliminar el trabajo seleccionado',className:'btn btn-danger pull-right'},
		  },
		  callback: function(result){
			  if(result===true){
				window.location.href=target;  	
			  }
		  }
		});
	};
</script>
@endsection
@extends('master')
@section('titulo','Tipos de trabajos')
@section('contenido')
<div class="container">
	<div class="col col-md-8 col-md-push-2">

		<div class="well">
			<legend>Editar tipo de trabajo</legend>
			<form class="form" id="form" method="post" autocomplete="off">
				<fieldset>
					{{csrf_field()}}
					<input type="hidden" name="id_tipo_trabajo" value="{{$tipoTrab->id_tipo_trabajo}}">
					<div class="form-group">
						<label class="control-label col-md-3" for="nombre">Nombre:</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="nombre" name="nombre" value="{{$tipoTrab->nombre}}">
						</div>
						<div class="col-md-3">
							<button type="submit" class="btn btn-success">Guardar</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>

		<div class="well">
			<legend>Tipos de trabajos</legend>
			@if(isset($tiposTrabajos)&&!$tiposTrabajos->isEmpty())
				<table class="table table-hover table-striped table-condensed table-responsive  ">
					<thead>
						<th>Nombre</th>
						<th></th>
					</thead>
					<tbody>
						@foreach($tiposTrabajos as $tip)
						<tr>
							<td>{{$tip->nombre}}</td>
							<td>
								<a class="btn btn-link" style="color:green" href="{{action('ControladorTipoTrabajo@editarTipoTrabajoForm',$tip->id_tipo_trabajo)}}">Editar</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			@else
				No existen tipos de trabajos registrados
			@endif
		</div>
		
	</div>
</div>
@endsection
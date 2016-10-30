@extends('master')
@section('title','Nuevo Item')
@section('content')
<div class="container">
<div class="col col-lg-8 col-lg-push-2">
	
		@if($errors->all())
		   <div class="alert alert-danger">
		   	Se han detectado los siguientes errores:
		   	<ul>
		   @foreach ($errors->all() as $error)
		     <li> {{ $error }}</li>
		  @endforeach
		  	</ul>
		  </div>
		@endif

	<div class="well">
		<legend>Nuevo item para trabajo</legend>
		<form method="post">
			{{csrf_field()}}
			<input type="hidden" name="job_id" value="{{$job->id}}">
			<fieldset>
				<div class="form-group">
					<label class="label-control col-lg-2" for="nombre">*Nombre:</label>
					<div class="form-group col-lg-4">
						<input type="text" name="nombre" class="form-control">
					</div>
				<label class="label-control col-lg-2" for="nombre">Trabajo:</label>
					<div class="form-group col-lg-4">
						<input type="text" name="trabajo" class="form-control" readonly value="{{$job->titulo}}">
					</div>
				</div>

				<div class="form-group">
					<label class="label-control col-lg-2" for="precio_unitario">*Precio unitario:</label>
					<div class="form-group col-lg-4">
						<input class="form-control" type="number" name="precio_unitario" value="0">
					</div>
				</div>

				<div class="form-group">
					<label class="label-control col-lg-2" for="unidad_medida">Unidad de medida:</label>
					<div class="form-group col-lg-4">
						<input class="form-control" type="text" name="unidad_medida">
					</div>
				</div>

				<div class="form-group">
					<label class="label-control col-lg-2" for="cantidad">*Cantidad:</label>
					<div class="form-group col-lg-4">
						<input class="form-control" type="number" name="cantidad" value="1">
					</div>
				</div>

			</fieldset>
			<div class="form-group">
				<a class="btn btn-warning" href="{{action('PagesController@showTrabajoDetail',$job->id)}}">Cancelar y volver al trabajo</a>
				<button type="submit" class="btn btn-success">Agregar nuevo item</button>
			</div>
		</form>
	</div>
</div>
</div>
@endsection
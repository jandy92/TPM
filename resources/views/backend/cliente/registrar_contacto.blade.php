@extends('master')
@section('titulo','Registrar Contacto')
@section('contenido')

<div class="container">
	<div class="col col-md-8 col-md-push-2">
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
			<legend>Registrar Persona de Contacto</legend>
			<form class="form" id="form" method="post" autocomplete="off">
				<fieldset>
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-label col-md-3" for="nombre">Nombre:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="nombre" name="nombre">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="apellido">Apellido:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="apellido" name="apellido">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="email">Email:</label>
						<div class="col-md-9">
							<input type="email" class="form-control" id="email" name="email">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="telefono">Teléfono:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="telefono" name="telefono">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12 col-md-push-8">
							<div class="row">&nbsp;</div>
							<button type="submit" class="btn btn-success">Registrar</button>
							&nbsp;
						<a href="{{action('ControladorCliente@listaDeContacto')}}" class="btn btn-warning">Cancelar</a>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
@endsection
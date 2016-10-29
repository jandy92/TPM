@extends('master')
@section('title','Nuevo contacto')
@section('content')
<div class="col col-md-6 col-md-push-3">
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
		<legend>Registrar nuevo contacto</legend>
		<form class="form" method="POST">
			<fieldset>
				{{csrf_field()}}

				<div class="form-group">
					<label class="control-label col-md-2" for="rut">R.U.T:</label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="rut" name="rut">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-2" for="name">Nombre:</label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="name" name="name">
					</div>
				</div>
				
				<div class="row"></div>
				<div class="form-group">
					<label class="control-label col-md-2" for="email">E-mail:</label>
					<div class="col-md-10">
						<input type="email" class="form-control" id="email" name="email">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-2" for="phone">Teléfono:</label>
					<div class="col-md-10">
						<input type="phone" class="form-control" id="phone" name="phone">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-2" for="roles">Representa a cliente</label>
					<div class="col-md-10">
						<select class="form-control"  name="empresas[]" disabled>
							
						</select>
					</div>
				</div>

			</fieldset>
			<div class="form-group">
				<div class="row">&nbsp;</div>
				<a href="{{action('ContactsController@showContactosList')}}" class="btn btn-warning">Volver a lista de contactos</a>
				<button type="submit" class="btn btn-success">Registrar</button>
			</div>
		</form>
	</div>
</div>
@endsection
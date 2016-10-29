@extends('master')
@section('title','Nuevo usuario')
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
		<legend>Registrar nuevo usuario</legend>
		<form class="form" method="POST" autocomplete="off">
			<fieldset>
				{{csrf_field()}}
				<div class="form-group">
					<label class="control-label col-md-2" for="name">Nombre:</label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="name" name="name">
					</div>
				</div>
				

				<div class="form-group">
					<label class="control-label col-md-2" for="password">Contraseña:</label>
					<div class="col-md-10">
						<input type="password" class="form-control" id="password" name="password">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-2" for="password">Verificar contraseña:</label>
					<div class="col-md-10">
						<input type="password" class="form-control" id="password" name="password_confirmation">
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
					<label class="control-label col-md-2" for="roles">Roles</label>
					<div class="col-md-10">
						<select class="form-control" multiple="true" name="roles[]">
							@foreach($roles as $role)
							<option value="{{$role->id}}"  
							@if($role->name=='user')
							selected
							@endif
							>
							{{$role->display_name}}</option>
							@endforeach
						</select>
					</div>
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-10"><font color="black">
					&nbsp;&nbsp;Puede seleccionar más de un rol presionando <kbd>Ctrl</kbd> y seleccionando.
					</font></div>
				</div>


			</fieldset>
			<a href="{{action('UsersController@showUsersList')}}" class="btn btn-warning">Volver a lista de usuarios</a>
			<button type="submit" class="btn btn-success">Registrar</button>
		</form>
	</div>
</div>
@endsection
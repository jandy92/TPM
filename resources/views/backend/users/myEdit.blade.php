@extends('master')
@section('title','Editar usuario')
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
		@if($user)
		<legend>Editar usuario</legend>
		<form class="form" method="POST">
			<fieldset>
				{{csrf_field()}}
				<input type="hidden" name="user_id" value="{{$user->id}}">
				<div class="form-group">
					<label class="control-label col-md-2" for="name">Nombre:</label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" >
					</div>
				</div>
				

				<div class="form-group">
					<label class="control-label col-md-2" for="password">Contraseña:</label>
					<div class="col-md-10">
						<input type="password" class="form-control" id="password" name="password" placeholder="dejar en blanco para mentener">
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
						<input type="email" class="form-control" id="email" name="email" placeholder="dejar en blanco para mentener">
					</div>
				</div>

				@if($user->hasRole('admin'))
				<div class="form-group">
					<label class="control-label col-md-2" for="roles">Roles</label>
					<div class="col-md-10">
						<select class="form-control" multiple="true" name="roles[]">
							@foreach($roles as $role)
							<option value="{{$role->id}}" @if($user->hasRole($role->name))selected @endif >
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
				@endif

			</fieldset>
			<div class="col col-lg-12">
			<br>
				<a href="{{action('UsersController@showCurrentUserInfo')}}" class="btn btn-warning">Volver a informacion</a>
				<button type="submit" class="btn btn-success">Guardar cambios</button>
			</div>
		</form>
	@else
	No se encuentra el usuario solicitado
	@endif
	</div>
</div>
@endsection
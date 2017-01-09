@extends('master')
@section('titulo','Nuevo usuario')
@section('contenido')
<div class="container">
	<div class="well">
		<legend>Registrar Nuevo Usuario</legend>
		@foreach ($errors->all() as $error)
		<p class="alert alert-danger">{{ $error }}</p>
		@endforeach 
		@if(isset($roles))
		<form class="form" method="POST" autocomplete="false">
			 {{ csrf_field() }}
			<fieldset>
				<div class="form-group">
					<label class="col-lg-2" for="nombre">Nombre de usuario</label>
					<div class="col-lg-4">
						<input class="form-control" type="text" name="nombre">
					</div>
					<label class="col-lg-1" for="email">E-mail</label>
					<div class="col-lg-5">
						<input class="form-control" type="email" name="email">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-2" for="rol">Rol</label>
					<div class="col-lg-4">
						<select class="form-control" name="rol">
						<option value="-1">Sin rol</option>
						@foreach($roles as $rol)
						<option value="{{$rol->id}}">{{$rol->display_name}}</option>
						@endforeach
						</select>
					</div>
					<label class="col-lg-1" for="pwd">Contraseña</label>
					<div class="col-lg-5">
						<input type="text" class="form-control" name="pwd" value="{{bin2hex(openssl_random_pseudo_bytes(12))}}" readonly>
					</div>
				</div>
				<div class="row"></div>
				<div class="form-group">				
					<div class="checkbox">
						<label><input id="activado" type="checkbox" name="activado" value="0">Activar usuario después de crear</label>
					</div>
				</div>
				<p>Si no está marcada la opción <b>activar usuario después de crear</b>, el usuario creado quedará <b style="color:red">desactivado</b> (no pordá iniciar sesión) hasta que sea verificado vía correo electrónico (Se enviará un email de verificación al e-mail especificado).</p>
				<p><i>La contraseña es generada automáticamente. Podrá ser cambiada en el futuro.</i></p>
				<div class="form-group">
					<div class="col-lg-12">
						<button class="btn btn-success" type="submit">Crear nuevo usuario</button>
					</div>
				</div>

			</fieldset>
		</form>
		@else
		@endif
	</div>
</div>

<script type="text/javascript">
	$('#activado').on('click',function(){
		if($(this).is(':checked')){
			$(this).val("1");
		}else{
			$(this).val("0");
		}
	});
</script>

@endsection
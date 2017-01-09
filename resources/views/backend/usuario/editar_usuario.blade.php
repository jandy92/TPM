@extends('master')
@section('titulo','Editar usuario')
@section('contenido')
<div class="container">
	<div class="well">
		<legend>Registrar Nuevo Usuario</legend>
		@foreach ($errors->all() as $error)
		<p class="alert alert-danger">{{ $error }}</p>
		@endforeach 
		@if(isset($roles) && isset($usuario))
		<form class="form" method="POST" autocomplete="false">
			 {{ csrf_field() }}
			<fieldset>
				<input type="hidden" name="id_usuario" value="{{$usuario->id}}">
				<div class="form-group">
					<label class="col-lg-2" for="nombre">Nombre de usuario</label>
					<div class="col-lg-4">
						<input class="form-control" type="text" id="nombre" name="nombre">
					</div>
					<label class="col-lg-1" for="email">E-mail</label>
					<div class="col-lg-5">
						<input class="form-control" type="email" id="email" name="email">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-2" for="rol">Rol</label>
					<div class="col-lg-4">
						<select class="form-control" id="rol" name="rol">
						<option value="-1">Sin rol</option>
						@foreach($roles as $rol)
						<option value="{{$rol->id}}">{{$rol->display_name}}</option>
						@endforeach
						</select>
					</div>
					<label class="col-lg-1" for="pwd">Contraseña</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" id="pwd" name="pwd" placeholder="Mantener actual" readonly>
					</div>
					
					<a id="nueva_pass_link" class="col-lg-1" href="#" onclick="nuevaPass()">Nueva</a>
					<a style="visibility: hidden" id="mantener_pass_link" class="col-lg-1" href="#" onclick="revertPass()">Deshacer</a>
					
				</div>
				<div class="row"></div>

				<div class="form-group">
					<div class="col-lg-12">
						<button class="btn btn-success" type="submit">Guardar cambios</button>
					</div>
				</div>

			</fieldset>
		</form>
		@else
		@endif
	</div>
</div>

@if(isset($roles) && isset($usuario))
<script type="text/javascript">
	$('#nombre').val('{{$usuario->name}}');
	$('#email').attr('placeholder','Dejar en blanco para mantener {{$usuario->email}}');
	@if(sizeof($usuario->roles)>0)
		console.log("jk");
		var rol_id={{$usuario->roles->first()->id}};
	@else
		var rol_id=-1;
	@endif
	$('#rol').val(rol_id);

	function nuevaPass(){
		$('#pwd').val("{{bin2hex(openssl_random_pseudo_bytes(12))}}");
		$('#nueva_pass_link').css('visibility','hidden');
		$('#mantener_pass_link').css('visibility','visible');
	}
	function revertPass(){
		$('#pwd').val("");
		$('#mantener_pass_link').css('visibility','hidden');
		$('#nueva_pass_link').css('visibility','visible');
	}
</script>
@endif
@endsection
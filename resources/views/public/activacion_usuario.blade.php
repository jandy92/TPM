<!DOCTYPE html>
<html>
<head>
	<title>Activación de usuario</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
	<div class="container">
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
		TPM - INGENIERIA
		<div class="well">
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach 
			<legend>Activación de cuenta</legend>
			<p><b><h3>Bienvenido, {{$usuario->name}}.</h3></b></p>
			<p>Su cuenta ha sido activada con éxito.Para finalizar, ingrese una contraseña para su usuario.</p>
			<form class="form" autocomplete="off" method="POST">
				{{csrf_field()}}
				<input type="hidden" name="user_id" value="{{$usuario->id}}">

				<div class="form-group">
					<label class="col-lg-1" for="password">Contraseña</label>
					<div class="col-lg-8">
						<input class="form-control" type="password" id="password" name="password">
					</div>
					<div class="row"></div>
				</div>

				<div class="form-group">
					<label class="col-lg-1" for="password2">Repetir</label>
					<div class="col-lg-8">
						<input class="form-control" type="password" id="password2" name="password2">
					</div>
					<button class="btn btn-success">Establecer contraseña</button>
				</div>
				<div><span id="error_msg" style="color:red;visibility: hidden;"></span></div>
				<div class="row"></div>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

<script type="text/javascript">
	$('#password2').on('input',function(){
		var pass1=$('#password').val();
		var pass2=$(this).val();
		if(pass1!=pass2){
			$('#error_msg').css('visibility','visible');
			$('#error_msg').css('color','red');
			$('#error_msg').text("Las contraseñas no coinciden!.");
		}else{
			$('#error_msg').css('visibility','visible');
			$('#error_msg').css('color','green');
			$('#error_msg').text("Las contraseñas coinciden!.");
		}
	})
</script>

</body>
</html>
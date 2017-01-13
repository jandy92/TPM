<!DOCTYPE html>
<html>
<head>
	<title>Nueva</title>
</head>
<body>
	<p>Hola, <b>{{$user->name}}</b>!</p>
	<p>Este mail ha sido generado automáticamente para proporcionarle un link de activación de su cuenta.</p>
	<p>Para proceder, entre a <a href="{{action('ControladorUsuario@activarUsuarioToken',$user->activation_token)}}"> este enlace</a> .</p>


</body>
</html>
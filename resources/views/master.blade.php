<!DOCTYPE html>
<html>
	<head>
		<title>@yield('titulo')</title>
		<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	</head>
	<body>
		@include('barra_navegacion')
		<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
		@yield('contenido')		
		<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	</body>
</html>
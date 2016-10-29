<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<!--link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-theme.min.css')}}"-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.Rut.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
<style type="text/css">

</style>
@include('layouts.navbar')
@yield('content')

<script type="text/javascript">
	$(document).on("keypress", "form", function(event) { //desactivar enter para submit de formularios
	    return event.keyCode != 13;
	});
</script>

</body>
<footer>	
<div class="container">
	PROCESOS TPM INGENIERIA - {{Carbon\Carbon::now()}}
</div>
</footer>
</html>
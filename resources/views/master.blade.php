<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<!--link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-theme.min.css')}}"-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.Rut.min.js')}}"></script>
</head>
<body>
<input id="auth" type="hidden" value="" >
<style type="text/css">

</style>
@include('layouts.navbar')
@yield('content')

<script type="text/javascript">

 $(document).ready(function(){
   $('body').hide();
            if ($('#auth').val().length == 0){
                $('#auth').val('yes');
                $('body').show();
            }
            else{
                location.reload();
            }
 });


$(window).keydown(function(event){
    if((event.which== 13) && ($(event.target)[0]!=$("textarea")[0])) {
      event.preventDefault();
      return false;
    }
  });

</script>

</body>
<footer>	
<div class="container">
	PROCESOS TPM INGENIERIA - {{Carbon\Carbon::now()}}
</div>
</footer>
</html>
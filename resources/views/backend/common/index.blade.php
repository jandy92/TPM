@extends('master')
@section('title','Inicio')
@section('content')

<div class="container">
	<div class="well well-lg-8-push-2">
		<legend>Bienvenid@, {{Auth::user()->name}}.</legend>
	</div>
</div>

@endsection
@extends('master')
@section('title','Inicio')
@section('content')

<div class="container">
	<img style="width: 100%" src="{{asset('images/banners/banner_2.png')}}">
	<div class="well well-lg-8-push-2">
		<legend>Bienvenid@, {{Auth::user()->name}}.</legend>
	</div>
</div>

@endsection
@extends('master')

@if($user)
	@section('title','Editar usuario')
	@section('content')
	
	<div class="container col-lg-8 col-lg-push-2">
		<div class="well">
			<legend>Información del usuario.</legend>
			<table class="table">
				<tr>
					<th>Nombre:</th>
					<td>{{$user->name}}</td>
				</tr>
				<tr>
					<th>E-mail:</th>
					<td>{{$user->email}}</td>
				</tr>
				<tr>
					<th>Roles:</th>
					<td>
						@foreach($user->getRoles() as $role)
						{{$role->display_name}}<br>
						@endforeach	
					</td>
				</tr>
			</table>
			<a class="btn btn-warning" href="{{action('UsersController@showCurrentUserEditForm')}}">Cambiar datos</a>
		</div>
	</div>

	@endsection
@else
	@section('title','Editar usuario - Error')
	@section('content')
	USUARIO NO ENCONTRADO
	@endsection
@endif
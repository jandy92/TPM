@extends('master')
@section('title','Lista de usuarios')
@section('content')

<div class="col col-lg-8 col-lg-push-2">
	<div class="col">
		<a href="{{action('UsersController@showNewUserForm')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Agregar nuevo usuario</a>
	</div>
	<div class="well">
		<legend>Lista de usuarios registrados</legend>
		@if(!$users->isEmpty())
			<table class="table table-hover table-striped table-condensed table-responsive  ">
				<thead>
					<!--th>ID</th-->
					<th>Nombre</th>
					<th>Correo</th>
					<th>Permisos</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($users as $u)
					<tr>
						<!--td>{{$u->id}}</td-->
						<td>{{$u->name}}</td>
						<td>{{$u->email}}</td>
						<td>
							@foreach($u->getRolesNames() as $role)
								{{$role}}<br>
							@endforeach
						</td>
						<td>
							@if($u->id!=1)
							<a class="btn btn-warning" href="{{action('UsersController@showUserInfo',$u->id)}}">informacion</a>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			No hay usuarios registrados
		@endif
	</div>
</div>
@endsection
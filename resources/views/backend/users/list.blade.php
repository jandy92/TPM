@extends('master')
@section('title','Lista de usuarios')
@section('content')

<div class="container">
	<div class="well">
		<legend>Lista de usuarios registrados</legend>
		@if(isset($users))
			<table class="table .table-hover">
				<thead>
					<th>ID</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Permisos</th>
				</thead>
				<tbody>
					@foreach($users as $u)
					<tr>
						<td>{{$u->id}}</td>
						<td>{{$u->name}}</td>
						<td>{{$u->email}}</td>
						<td>
							<ul>
							@foreach($u->getRolesNames() as $role)
								<li>{{$role}}</li>
							@endforeach
							</ul>
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
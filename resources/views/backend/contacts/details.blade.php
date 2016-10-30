@extends('master')
@section('title','Detalles del contacto')
@section('content')
<div class="container">
	<div class="col col-lg-8 col-lg-push-2">
		<div class="well">
			<legend>Detalles de contacto</legend>
			<div class="table-responsive">
				<table class="table table-stripped">
					<tr>
						<th>Nombre:</th>
						<td>{{$contact->nombre}}</td>
					</tr>
					<tr>
						<th>R.U.T:</th>
						<td>{{$contact->rut}}</td>
					</tr>
					<tr>
						<th>Teléfono:</th>
						<td>{{$contact->telefono}}</td>
					</tr>
					<tr>
						<th>E-mail:</th>
						<td>{{$contact->email}}</td>
					</tr>
					<tr>
						<th>Creación:</th>
						<td>{{$contact->created_at}}</td>
					</tr>
					<tr>
						<th>Última actualización:</th>
						<td>{{$contact->updated_at}}</td>
					</tr>
				</table>
				<a class="btn btn-warning" href="#">Cambiar información</a>
				<a class="btn btn-danger" href="#">Eliminar contacto</a>
			</div>
		</div>
	</div>
</div>
@endsection
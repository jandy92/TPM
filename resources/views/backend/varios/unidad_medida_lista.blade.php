@extends('master')
@section('titulo','Unidades de medida')
@section('contenido')
<div class="container">
	<div class="col col-md-8 col-md-push-2">

		<div class="well">
		@foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
                @endforeach 
			<legend>Unidades de medida</legend>
			<form class="form" id="form" method="post" autocomplete="off">
				<fieldset>
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-label col-md-2" for="nombre">Nombre:</label>
						<div class="col-md-3">
							<input type="text" class="form-control" name="nombre">
						</div>
						<label class="control-label col-md-2" for="nombre">Abreviación:</label>
						<div class="col-md-3">
							<input type="text" class="form-control" name="abreviacion">
						</div>
						<div class="col-md-2">
							<button class="btn btn-primary">Agregar</button>
						</div>
						
					</div>
				</fieldset>
			</form>
			</div>
			<div class="well">

			<table class="table">
				<thead>
					<th>Nombre</th>
					<th>Abreviación</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($unidades as $u)
					<tr>
						<td>{{$u->nombre}}</td>
						<td>{{$u->nombre_abreviacion}}</td>
						<td>
							<a style="color:green" href="#">Editar</a>
							<a style="color:orange" href="#">Eliminar</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>	
@endsection
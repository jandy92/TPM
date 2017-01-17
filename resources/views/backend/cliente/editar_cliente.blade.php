@extends('master')
@section('titulo','Editar cliente')
@section('contenido')
	<div class = "container">
		<div class = "col col-md-8 col-md-push-2">
			<div class = "well">
				<legend>Editar Cliente</legend>
				@foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
                @endforeach 
				<form class="form" id="form" method="post" autocomplete="on" onsubmit="return submit_form()">
					<fieldset>
						{{csrf_field()}}
						<input type="hidden" name="id_cliente" value="{{$cliente->id_cliente}}">
					<div class="form-group">
						<label class="control-label col-md-3" for="rut">R.U.T:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="rut" name="rut" value="" placeholder="Mantener {{$cliente->rut_cliente}}"> 
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="nombre">Razón Social:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="nombre" name="nombre" value= "{{$cliente->nombre}}">
						</div>
					</div>

					<div class="row"></div>

					<div class="form-group">
						<label class="control-label col-md-3" for="giro">Giro:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="giro" name="giro" value="{{$cliente->giro}}">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="direccion">Dirección:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="direccion" name="direccion" value="{{$cliente->direccion}}">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="telefono">Teléfono:</label>
						<div class="col-md-9">
							<input type="phone" class="form-control" id="telefono" name="telefono" value="{{$cliente->telefono}}">
						</div>
					</div>

					<div class="row">&nbsp;</div>
					<div class="col">
						<label>Personas de contacto</label>
						<div class="panel panel-default">
							
	  						<div class="panel-body">
	  							<div class="table-responsive">
	  								<table class="table" id="tabla_contactos">
  										<thead>
  											<th>Nombre</th>
  											<th>Apellido</th>
  											<th>Email</th>
  											<th>Teléfono</th>
  											<th></th>
  										</thead>
  										<tbody>
  											<tr>
	  											<td><input class="form-control" type="text" id="new_nombre" ></td>
	  											<td><input class="form-control" type="text" id="new_apellido" ></td>
	  											<td><input class="form-control" type="text" id="new_email" ></td>
	  											<td><input class="form-control" type="text" id="new_telefono" ></td>
	  											<td><button type="button" onclick="addContacto()" class="btn btn-primary">+</button></td>
  											</tr>
  										</tbody>
	  								</table>
	  							</div>
							</div>
						</div>
					</div>
				<div class="form-group">
					<div class="col-md-12 col-md-push-8">
						<div class="row">&nbsp;</div>
						<button type="submit" class="btn btn-success">Editar</button>
						&nbsp;
						<a href="{{action('ControladorCliente@listaDeCliente')}}" class="btn btn-warning">Cancelar</a>
					</div>
				</div>
					</fieldset> 
				</form>
			</div>
		</div>
	</div>
		<script type="text/javascript">
			
		</script>
@endsection
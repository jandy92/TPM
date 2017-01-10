@extends('master')
@section('titulo','Registrar cliente')
@section('contenido')
<div class="container">
	<div class="col col-md-8 col-md-push-2">
		@if($errors->all())
		   <div class="alert alert-danger">
		   	Se han detectado los siguientes errores:
		   	<ul>
		   @foreach ($errors->all() as $error)
		     <li> {{ $error }}</li>
		  @endforeach
		  	</ul>
		  </div>
		@endif
		<div class="well">
			<legend>Registrar cliente</legend>
			<form class="form" method="post" autocomplete="off">
				<fieldset>
					{{csrf_field()}}

					<div class="form-group">
						<label class="control-label col-md-3" for="rut">R.U.T:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="rut" name="rut">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="nombre">Razón Social:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="nombre" name="nombre">
						</div>
					</div>

					<div class="row"></div>

					<div class="form-group">
						<label class="control-label col-md-3" for="giro">Giro:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="giro" name="giro">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="direccion">Dirección:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="direccion" name="direccion">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="telefono">Teléfono:</label>
						<div class="col-md-9">
							<input type="phone" class="form-control" id="telefono" name="telefono">
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
	  											<td><input class="form-control" type="text" id="new_nombre" name="new_nombre"></td>
	  											<td><input class="form-control" type="text" id="new_apellido" name="new_apellido"></td>
	  											<td><input class="form-control" type="text" id="new_email" name="new_email"></td>
	  											<td><input class="form-control" type="text" id="new_telefono" name="new_telefono"></td>
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
						<button type="submit" class="btn btn-success">Registrar</button>
						&nbsp;
						<a href="#" class="btn btn-warning">Cancelar</a>
					</div>
				</div>

				</fieldset>

			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
		$('#rut').focus();
		var id=0;
		var contactos={};




		function addContacto(){
			var nombre=$('#new_nombre').val();
			var apellido=$('#new_apellido').val();
			var email=$('#new_email').val();
			var telefono=$('#new_telefono').val();


			if(nombre.trim()!='' && apellido.trim()!=''){
				$('#new_nombre').val('');
				$('#new_apellido').val('');
				$('#new_email').val('');
				$('#new_telefono').val('');
				contactos[id]={'nombre':nombre,'apellido':apellido,'email':email,'telefono':telefono};
				renderTable();
				id++;
			}
		}

		function renderTable(){
			//$('#tabla_contactos').after('<tr><td><input class="form-control" type="text" id="new_nombre" name="new_nombre"></td><td><input class="form-control" type="text" id="new_apellido" name="new_apellido"></td><td><input class="form-control" type="text" id="new_email" name="new_email"></td><td><input class="form-control" type="text" id="new_telefono" name="new_telefono"></td><td><button type="button" onclick="addContacto()" class="btn btn-primary">+</button></td></tr>');
			//$('#tabla_contactos ').children( 'tr:not(:first)' ).empty();
			$('#tabla_contactos').find("tr:gt(1)").remove();  
			for(var c in contactos){
				var row='';
				row+='<td>'+contactos[c].nombre+'</td>';
				row+='<td>'+contactos[c].apellido+'</td>';
				row+='<td>'+contactos[c].email+'</td>';
				row+='<td>'+contactos[c].telefono+'</td>';
				row+='<td><button type="button" onclick="remContacto('+parseInt(c)+')" class="btn btn-danger">-</button</td>';
				$('#tabla_contactos tr:last').after('<tr id="'+c+'">'+row+'</tr>');
				//console.log(contactos[c].nombre);
			}
		}

		function remContacto(id){
			if (confirm('Seguro de eliminar persona de contacto seleccionada?')) {
				delete contactos[id]
				renderTable();
			}
		}

		$(window).keydown(function(event){
		    if(event.keyCode == 13) {
		      	event.preventDefault();
				if($('#new_nombre').is(":focus")||$('#new_apellido').is(":focus")||$('#new_email').is(":focus")||$('#new_telefono').is(":focus")){
		      	addContacto();
		      	$('#new_nombre').focus();
				}else{
					if($('#rut').is(":focus")){
						$('#nombre').focus();	
					}else if($('#nombre').is(":focus")){
						$('#giro').focus();
					}else if($('#giro').is(":focus")){
						$('#direccion').focus();
					}else if($('#direccion').is(":focus")){
						$('#telefono').focus();
					}
				}
		      	return false;
		    }
  });
</script>
@endsection
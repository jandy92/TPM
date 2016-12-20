@extends('master')
@section('titulo','Nuevo Trabajo')
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
			<legend>Formulario Trabajo</legend>
			<form class="form" method="post" autocomplete="off">
				<fieldset>
					{{csrf_field()}}

					<div class="form-group">
						<label class="control-label col-md-3" for="titulo">Título:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="titulo" name="titulo">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="cliente">Cliente:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="cliente" name="cliente">
						</div>
					</div>

					<div class="row"></div>

					<div class="form-group">
						<label class="control-label col-md-3" for="contacto">Persona Contacto:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="contacto" name="contacto">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="tipo">Tipo de trabajo:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="tipo" name="tipo">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="numeroorden">NºOT:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="numeroorden" name="numeroorden">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-12">Persona de Contacto</label>
						<div class="col-md-2">
							<input type="text" class="form-control" id="nomCont" name="nomCont" placeholder="Nombre">
						</div>
						<div class="col-md-2">
							<input type="text" class="form-control" id="apCont" name="apCont" placeholder="Apellido">
						</div>
						<div class="col-md-2">
							<input type="text" class="form-control" id="telCont" name="telCont" placeholder="Teléfono">
						</div>
						<div class="col-md-3">
							<input type="text" class="form-control" id="emailCont" name="emailCont" placeholder="E-mail">
						</div>
						<div class="col-md-2 col-md-push-1">
							<button type="submit" class="btn btn-success">Agregar</button>
						</div>
					</div>

					<div class="form-group"><div class="col-md-2"><br></div>
						<div class="col-md-12">
							<select name="sometext" multiple="multiple" style="width: 500px;" size="5">
							    <option>Contacto #1</option>
						 	</select>
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
		$('#rut').on('input',function(){
			//quitar espacios y validar rut al ingresar valores
			var r=$('#rut').val();
			r = r.replace(/\s+/g, '');
			$('#rut').val(r);
			var v=$.Rut.validar($('#rut').val());
			if(!v){
				$('#rut').css('color','red');
			}else{
				$('#rut').css('color','green');
			}
		});
		$('#rut').Rut({
			format_on: 'keyup'
		});
</script>
@endsection
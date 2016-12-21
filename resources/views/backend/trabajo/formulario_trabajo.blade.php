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
						<label class="control-label col-md-3" for="numeroOrden">NºOT:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="numeroOrden" name="numeroOrden">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="montoNeto">Monto Neto:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="montoNeto" name="montoNeto">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="montoBruto">Monto Bruto:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="montoBruto" name="montoBruto">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="fechaCobro">Fecha de emision:</label>
						<div class="col-md-9">
							<input type="date" class="form-control" id="fechaCobro" name="fechaCobro">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="folio">Folio:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="folio" name="folio">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="ocnpnum">OC/NP numero:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="ocnpnum" name="ocnpnum">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="documento">Documento:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="documento" name="documento">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="fechaPago">Pagado en:</label>
						<div class="col-md-9">
							<input type="date" class="form-control" id="fechaPago" name="fechaPago">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="estadoActual">Estado:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="estadoActual" name="estadoActual">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="envioFactura">Enviar factura a:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="envioFactura" name="envioFactura">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="comentario">Comentario:</label>
						<div class="col-md-9" h>
							<input type="textarea" class="form-control" id="comentario" name="comentario">
							<textarea cols=60 rows=10 name="comentario"></textarea>
						</div>
					</div>
				

				<div class="form-group">
					<div class="col-md-5 col-md-push-5">
						<div class="row">&nbsp;</div>
						<button type="submit" class="btn btn-success">Guardar</button>
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
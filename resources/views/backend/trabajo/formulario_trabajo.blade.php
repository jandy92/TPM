@extends('master')
@section('titulo','Nuevo Trabajo')
@section('contenido')
<head>
<style>
div.form-group {
    padding-bottom: 25px;
}
</style>
</head>
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
		<div class="well" >
			<legend>Formulario Trabajo</legend>
			<form class="form" method="post" autocomplete="off">
				<fieldset>
					{{csrf_field()}}

					<div class="form-group">
						<label class="control-label col-md-3" for="titulo">Título:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="titulo" name="titulo" value="{{$cotizacion->nombre}}" readonly>

						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="cliente">Cliente:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="cliente" name="cliente" value="{{$cotizacion->cliente->nombre}}" readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="folio">Nº Folio:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="folio" name="folio" value="{{$cotizacion->folio_cotizacion}}" readonly>
						</div>
					</div>

					<div class="row"></div>

					<div class="form-group">
						<label class="control-label col-md-3" for="contacto">Persona Contacto:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="contacto" name="contacto" value="{{$cotizacion->contacto->nombre}}"  readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="tipo_trabajo">Persona Contacto:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="tipo_trabajo" name="tipo_trabajo" value="{{$cotizacion->tipo_trabajo->nombre}}"  readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="gastofijo">Monto Neto:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="gastofijo" name="gastofijo" value="${{$cotizacion->gasto_fijo}}" readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="montoBruto">Monto Bruto:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="montoBruto" name="montoBruto" value="${{$cotizacion->gasto_fijo * 1.19}}" readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="tipo">Tipo de trabajo:</label>
						<div class="col-md-9">
							<select name="estado" style="width: 487px">
								@foreach($estados as $estado)
									<option value="{{$estado->id_estado}}">{{$estado->nombre}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="numero_factura">Documento:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="numero_factura" name="numero_factura">

						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="orden_trabajo">NºOT:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="orden_trabajo" name="orden_trabajo">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="fecha_emision">Emisión cobro:</label>
						<div class="col-md-9">
							<input type="date" class="form-control" id="fecha_emision" name="fecha_emision">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="orden_compra">OC/NP numero:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="orden_compra" name="orden_compra">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="fecha_pago">Pagado en:</label>
						<div class="col-md-9">
							<input type="date" class="form-control" id="fecha_pago" name="fecha_pago">
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-md-3" for="receptor_factura">Enviar factura a:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="receptor_factura" name="receptor_factura">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="comentario">Comentario:</label>
						<div class="col-md-9" h>
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

		/*
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
		*/
</script>
@endsection
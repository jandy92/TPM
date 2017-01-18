@extends('master')
@section('titulo','Informacion Trabajo')
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
			<legend>Informacion de trabajo</legend>
			<form class="form" method="post" autocomplete="off">
				<fieldset>
					{{csrf_field()}}

					<div class="form-group">
						<label class="control-label col-md-3" for="titulo">Título:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="titulo" name="titulo" value="{{$trabajo->cotizacion->nombre}}" readonly>

						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="cliente">Cliente:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="cliente" name="cliente" value="{{$trabajo->cotizacion->cliente->nombre}}" readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="folio">Nº Folio:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="folio" name="folio" value="{{$trabajo->cotizacion->folio_cotizacion}}" readonly>
						</div>
					</div>

					<div class="row"></div>

					<div class="form-group">
						<label class="control-label col-md-3" for="contacto">Persona Contacto:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="contacto" name="contacto" value="{{$trabajo->cotizacion->contacto->nombre}}"  readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="tipo_trabajo">Persona Contacto:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="tipo_trabajo" name="tipo_trabajo" value="{{$trabajo->cotizacion->tipo_trabajo->nombre}}"  readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="gastofijo">Monto Neto:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="gastofijo" name="gastofijo" value="${{$trabajo->cotizacion->gasto_fijo}}" readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="montoBruto">Monto Bruto:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="montoBruto" name="montoBruto" value="${{$trabajo->cotizacion->gasto_fijo * 1.19}}" readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="tipodetrabajo">Tipo de Trabajo:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="tipodetrabajo" name="tipodetrabajo" value="{{$trabajo->cotizacion->tipo_trabajo->nombre}}" readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="tipo">Estado:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="estado" name="estado" value="{{$trabajo->estado->nombre}}" style = "background-color: #{{$trabajo->estado->color}}; color: #{{$trabajo->estado->color_letra}}" readonly>
						</div>
					
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="numero_factura">Documento:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="numero_factura" name="numero_factura" value="{{$trabajo->numero_factura}}" readonly >

						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="orden_trabajo">NºOT:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="orden_trabajo" name="orden_trabajo" value="{{$trabajo->orden_trabajo}}"  readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="fecha_emision_cobro">Emisión cobro:</label>
						<div class="col-md-9">
							<input type="date" class="form-control" id="fecha_emision_cobro" name="fecha_emision_cobro" value="{{$trabajo->fecha_emision_cobro}}" readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="orden_compra">OC/NP numero:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="orden_compra" name="orden_compra" value="{{$trabajo->orden_compra}}" readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="fecha_pago">Pagado en:</label>
						<div class="col-md-9">
							<input type="date" class="form-control" id="fecha_pago" name="fecha_pago" value="{{$trabajo->fecha_pago}}" readonly>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-md-3" for="receptor_factura">Enviar factura a:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="receptor_factura" name="receptor_factura" value="{{$trabajo->receptor_factura}}" readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="comentario">Comentario:</label>
						<div class="col-md-9" h>
							<textarea cols=60 rows=10 name="comentario" readonly>{{$trabajo->comentario}}</textarea>
						</div>
					</div>
				

				<div class="form-group">
					<div class="col-md-5 col-md-push-5">
						<div class="row">&nbsp;</div>
						
						<a href="{{action('ControladorTrabajo@listaDeTrabajo')}}" class="btn btn-warning">Salir</a>
					</div>
				</div>

				</fieldset>

			</form>
		</div>
	</div>
</div>

@endsection
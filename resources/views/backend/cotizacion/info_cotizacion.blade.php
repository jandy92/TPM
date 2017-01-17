@extends('master')
@section('titulo','Información cotización')
@section('contenido')
<div class="container">
			<div class="col col-md-8 col-md-push-2">
				<div class="well">
					<div class="form-group">
						<img class="" src="../../images/logos/tpm.jpeg" style="width: 100px">
						<label class="control-label" for="info"><h2>TPM Ingeniería E.I.R.L.</h2></label>
					</div>
					<legend>Información para Cotización</legend>
					<fieldset>
						<div class="form-group">
							<label class="control-label col-md-4">N° de Folio</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="titulo" name="titulo" value="{{$cotizacion->folio_cotizacion}}" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-4">Título</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="titulo" name="titulo" value="{{$cotizacion->nombre}}" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-4">Cliente</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="cliente" name="cliente" value="{{$cotizacion->cliente->nombre}}" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-4">Persona de Contacto</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="contacto" name="contacto" value="{{$cotizacion->contacto->nombre}} {{$cotizacion->contacto->apellido}}" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-4">Tipo de trabajo</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="tipo" name="tipo" value="{{$cotizacion->tipo_trabajo->nombre}}" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-4">Descripcion trabajo</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$cotizacion->descripcion_trabajo}}" readonly>
							</div>
						</div>

						<div class="row">&nbsp;</div>
						<div class="col">
							<label><h4>Detalles</h4></label>
							<div class="panel panel-default">
								<div class="panel-body">
			  						<div class="table-responsive">
			  							<table class="table" id="tabla_detalles">
		  									<thead>
												<th>Item</th>
												<th>Nombre</th>
												<th>Tipo</th>
												<th>Unidad de medida</th>
												<th>Cantidad</th>
												<th>Valor unitario</th>
												<th>Total</th>
											</thead>
											<tbody>
												<tr>
													<td>0</td>
													<td>Ayudante</td>
													<td>Mano de obra</td>
													<td>c/u</td>
													<td>12</td>
													<td>4000</td>
													<td>48.000</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
		</div>
@endsection
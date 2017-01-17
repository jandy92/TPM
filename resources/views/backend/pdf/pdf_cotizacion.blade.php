<!DOCTYPE html>
<html>
	<head>
		<title>PDF Cotizacion</title>
	</head>
	<body>
		<div class="container">
			<div class="col col-md-8 col-md-push-2">
				<div class="well">
					<div class="form-group">
						<img class="" src="../../images/logos/tpm.jpeg" style="width: 100px">
						<label class="control-label" for="info">TPM Ingeniería E.I.R.L.</label>
					</div>
					<legend>Informacion para Cotasdasdasdizacion</legend>
					<fieldset>
						<div class="form-group">
							<label class="control-label col-md-4">N° de Folio</label>
							<div class="col-md-8">
								<label class="control-label" for="folio">{{$cotizacion->folio_cotizacion}}</label>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-4">Título</label>
							<div class="col-md-8">
								<label class="control-label" for="titulo">{{$cotizacion->nombre}}</label>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-4">Cliente</label>
							<div class="col-md-8">
								<label class="control-label" for="cliente">{{$cotizacion->cliente->nombre}}</label>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-4">Persona de Contacto</label>
							<div class="col-md-8">
								<label class="control-label" for="contacto">{{$cotizacion->contacto->nombre}} {{$cotizacion->contacto->apellido}}</label>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-4">Tipo de trabajo</label>
							<div class="col-md-8">
								<label class="control-label" for="tipo">{{$cotizacion->tipo_trabajo->nombre}}</label>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-4">Descripcion trabajo</label>
							<div class="col-md-8">
								<label class="control-label" for="descripcion">{{$cotizacion->descripcion_trabajo}}</label>
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
												<th>Descripción</th>
												<th>Cantidad</th>
												<th>Valor unitario</th>
												<th>Valor total</th>
											</thead>
											<tbody>
												<tr>
													<td>0</td>
													<td>Holi</td>
													<td>tengo sueño</td>
													<td>mucho</td>
													<td>zzzzz</td>
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
	</body>
</html>
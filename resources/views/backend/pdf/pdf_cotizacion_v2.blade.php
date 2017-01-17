<!DOCTYPE html>
<html>
	<style>
		table.d1{
			width: 100%;
			border-collapse: separate;
    		border-spacing: 0px;
    		text-align: center;
    		border: 1px ridge black;
		}
		table.d2{
			border-collapse: separate;
    		border-spacing: 0px;
    		text-align: right;
    		border: 1px ridge black;
		}
		th.d1{
			border-bottom: 1px ridge black;
			border-right: 1px ridge black;
		}
		th.d2{
			border-bottom: 1px ridge black;
		}
		td.d1{
			border-right: 1px ridge black;
		}
	</style>
	<head>
		<title>PDF Cotizacion</title>
	</head>
	<body>
		<div>
			<div>
				<div>
					<div>
						<label>TPM Ingeniería E.I.R.L.</label>
					</div>
					<label><h4>Información para Cotización</h4></label>
					<fieldset>
						<table>
							<thead>
								<th></th>
								<th></th>
								<th></th>
							</thead>
							<tbody>
								<tr></tr>
								<tr>
									<td>N° de folio</td>
									<td>:</td>
									<td>{{$cotizacion->folio_cotizacion}}</td>
								</tr>
								<tr>
									<td>Título</td>
									<td>:</td>
									<td>{{$cotizacion->nombre}}</td>
								</tr>
								<tr>
									<td>Cliente</td>
									<td>:</td>
									<td>{{$cotizacion->cliente->nombre}}</td>
								</tr>
								<tr>
									<td>Persona de contacto</td>
									<td>:</td>
									<td>{{$cotizacion->contacto->nombre}} {{$cotizacion->contacto->apellido}}</td>
								</tr>
								<tr>
									<td>Tipo de trabajo</td>
									<td>:</td>
									<td>{{$cotizacion->tipo_trabajo->nombre}}</td>
								</tr>
								<tr>
									<td>Descripción trabajo</td>
									<td>:</td>
									<td>{{$cotizacion->descripcion_trabajo}}</td>
								</tr>
							</tbody>
						</table>

						<label><h4>Detalles</h4></label>
			  			<table class="d1">
		  					<thead>
								<th class="d1">Item</th>
								<th class="d1">Descripción</th>
								<th class="d1">Cantidad</th>
								<th class="d1">Valor unitario</th>
								<th class="d2">Valor total</th>
							</thead>
							<tbody>
								<tr></tr>
								<tr>
									<td class="d1">0</td>
									<td class="d1">Movilizacion</td>
									<td class="d1">1</td>
									<td class="d1">10.000</td>
									<td>10.000</td>
								</tr>
								<tr>
									<td class="d1">1</td>
									<td class="d1">Esmalte con anticorrosivo gris</td>
									<td class="d1">1</td>
									<td class="d1">19.500</td>
									<td>19.500</td>
								</tr>
							</tbody>
						</table>
						
					</fieldset>
				</div>
			</div>
		</div>
	</body>
</html>
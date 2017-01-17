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
    		text-align: right;
    		margin-left: auto;
    		width: 20%;
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
		thead.d3{
			background-color: lightgray;
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
						<label><h1>TPM Ingeniería E.I.R.L.</h1></label>
					</div>
					<label><h3>Información para Cotización</h3></label>
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
		  					<thead class="d3">
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
								<tr>
									<td class="d1">2</td>
									<td class="d1">Esmalte con anticorrosivo gris para puertas que sirven para nada grises</td>
									<td class="d1">0</td>
									<td class="d1">0</td>
									<td>0</td>
								</tr>
							</tbody>
						</table>
						<table class="d2">
							<thead></thead>
							<tbody>
								<td><b>Total</b></td>
								<td><b>29.500</b></td>
							</tbody>
						</table>
						<br>
					</fieldset>
				</div>
			</div>
		</div>
	</body>
</html>
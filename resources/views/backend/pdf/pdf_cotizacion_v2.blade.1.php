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
	<script type="text/javascript">
		var item_cot=[];
		var cont = 1;
	</script>
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
								<?php
									foreach($cotizacion->items as $it){
										print("<tr></tr>");
										print("<tr>");
											print('<td class="d1">');
											print('<script type="text/javascript">');
											print('</script>');
											print('</td>');
											print('<td class="d1">'.$it->nombre.'</td>.');
											print('<td class="d1">'.$it->pivot->cantidad.'</td>');
											print('<td class="d1">'.$it->pivot->precio_unitario.'</td>');
											print('<td>'.$it->pivot->cantidad*$it->pivot->precio_unitario.'</td>');
										print('</tr>');
								
								}
								?>
							</tbody>
						</table>
						
						<table >
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
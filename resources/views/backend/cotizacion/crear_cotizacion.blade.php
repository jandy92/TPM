@extends('master')
@section('titulo','Crear cotización')
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
			<legend><h3>Crear cotización</h3></legend>
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
						<label class="control-label col-md-3">Cliente</label>
						<div class="col-md-9">
							<select name="clientes" style="width: 300px">
							    <option>Cliente #1</option>
							    <option>Cliente #2</option>
							    <option>Cliente #3</option>
							</select>
						</div>
					</div>

					<div class="row"></div>

					<div class="form-group">
						<label class="control-label col-md-3">Persona de contacto</label>
						<div class="col-md-9">
							<select name="contactos" style="width: 300px">
							    <option>Contacto #1</option>
							    <option>Contacto #2</option>
							    <option>Contacto #3</option>
							</select>
						</div>
					</div>

					<div class="row"></div>
					<div class="form-group">
						<label class="control-label col-md-3">Tipo de trabajo</label>
						<div class="col-md-9">
							<select name="tiposTrab" style="width: 300px">
							    <option>Instrumentación</option>
							    <option>Eléctrico</option>
							</select>
						</div>
					</div>

					<div class="row"></div>
					<div class="form-group">
						<label class="control-label col-md-3" for="descTrab">Descripción trabajo</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="descTrab" name="descTrab">
						</div>
					</div>			

					<div class="form-group">
						<label class="control-label col-md-12"><h4>Agregar items</h4></label>
						<div class="col-md-2">
							<input type="text" class="form-control" id="nomMat" name="nomMat" placeholder="Nombre">
						</div>
						<div class="col-md-2">
							<input type="text" class="form-control" id="unidMed" name="unidMed" placeholder="Unidad">
						</div>
						<div class="col-md-2">
							<input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad">
						</div>
						<div class="col-md-2">
							<input type="text" class="form-control" id="valorUn" name="valorUn" placeholder="Valor unitario">
						</div>
						<div class="col-md-2">
							<select id="tiposMat" name="tiposMat" style="height: 33px">
								<option>Tipo</option>
							    <option>Material</option>
							    <option>Mano de obra</option>
							</select>
						</div>
						<div class="col-md-2">
							<button onclick="nuevoItem()" type="button" class="btn btn-success">Agregar</button>
						</div>
					</div>


					<div class="form-group"><div class="col-md-2"><br></div>
						<label class="control-label col-md-12" for="descTrab"><h4>Detalles</h4></label>
						<div class="col-md-12">
							<table class="table">
								<thead>
									<th>Item</th>
									<th>Nombre</th>
									<th>Tipo</th>
									<th>Unidad de medida</th>
									<th>Cantidad</th>
									<th>Valor unitario</th>
									<th>Total</th>
									<th> </th>
								</thead>
								<tbody>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td>
											<button type="button" class="btn btn-danger">x</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="form-group"><div class="col-md-2"><br></div>
						<label class="control-label col-md-12"><h4>Monto final</h4></label>
						<div class="form-group">
							<div class="col-md-4">
								<label class="control-label col-md-6">Gastos fijos</label>
								<input type="text" class="form-control col-md-6" id="gastoFijo" name="gastoFijo" style="width: 100px">
							</div>
							<div class="col-md-4">
								<label class="control-label col-md-6">Utilidad (%)</label>
								<input type="text" class="form-control col-md-6" id="utilidad" name="utilidad" style="width: 100px">
							</div>
							<div class="col-md-4">
								<button onclick="nuevoItem()" type="button" class="btn btn-success">Agregar</button>
							</div>
						</div>

						<div class="col-md-12">
							<table class="table">
								<thead>
									<th>Materiales</th>
									<th>Mano de obra</th>
									<th>SUBTOTAL</th>
									<th>Gastos fijos</th>
									<th>Utilidad (%)</th>
									<th>TOTAL</th>
								</thead>
								<tbody>
									<tr>
										<td>$<span id="total_materiales">0</span></td>
										<td>$<span id="total_mano">0</span></td>
										<td>$0</td>
										<td>$0</td>
										<td>$0</td>
										<td>$0</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>					


				<div class="form-group">
					<div class="col-md-12 col-md-push-8">
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

		function nuevoItem(){
			var total_item=$('#cantidad').val()*$('#valorUn').val();
			if($('#tiposMat').val()==='Material'){
				var total=parseInt($('#total_materiales').html())+total_item;
				$('#total_materiales').html(total);
			}else if($('#tiposMat').val()==='Mano de obra'){
				var total=parseInt($('#total_mano').html())+total_item;
				$('#total_mano').html(total);
			}
			$('#cantidad').val('');
			$('#valorUn').val('');
		}

		
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
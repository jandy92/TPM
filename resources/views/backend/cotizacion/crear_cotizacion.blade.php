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
							<input type="text" class="form-control" id="cliente" name="cliente">
						</div>
					</div>

					<div class="row"></div>

					<div class="form-group">
						<label class="control-label col-md-3">Persona de contacto</label>
						<div class="col-md-9">
							<select name="contactos" style="width: 300px">
							    <option>Seleccionar...</option>
							</select>
						</div>
					</div>

					<div class="row"></div>
					<div class="form-group">
						<label class="control-label col-md-3">Tipo de trabajo</label>
						<div class="col-md-9">
							<select name="tiposTrab" style="width: 300px">
							    <option>Seleccionar...</option>
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

					<div class="row">&nbsp;</div>
					<div class="col">
						<label><h4>Agregar items</h4></label>
						<div class="panel panel-default">
							<div class="panel-body">
		  						<div class="table-responsive">
		  							<table class="table" id="tabla_items">
	  									<thead>
	  										<th>Nombre</th>
	  										<th>Unidad</th>
	  										<th>Cantidad</th>
	  										<th>Valor Unitario</th>
	  										<th>Tipo</th>
	  										<th></th>
	  									</thead>
			  							<tbody>
		  									<tr>
			  									<td><input class="form-control" type="text" id="nombreMat" ></td>
			  									<td><input class="form-control" type="text" id="unidMed" ></td>
			  									<td><input class="form-control" type="text" id="cantidad" ></td>
			  									<td><input class="form-control" type="text" id="valorUn" ></td>
			  									<td>
			  										<select id="tiposMat" name="tiposMat" style="height: 33px">
			  											<option>Seleccionar...</option>
			  											<option>Material</option>
			  											<option>Mano de obra</option>
													</select>
												</td>
			  									<td><button type="button" onclick="agregarItem()" class="btn btn-primary">+</button></td>
		  									</tr>
		  								</tbody>
		  							</table>
		  						</div>
		  					</div>
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
											<th></th>
										</thead>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="row">&nbsp;</div>
					<div class="col">
						<label><h4>Monto final</h4></label>
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
								<button onclick="agregaMonto()" type="button" class="btn btn-success">Agregar</button>
							</div>
						</div>

					<div class="row">&nbsp;</div>
					<div class="col">
						<div class="panel panel-default">
							<div class="panel-body">
								<table class="table">
									<thead>
										<th>Materiales</th>
										<th>Mano de obra</th>
										<th>SUBTOTAL</th>
										<th>Gastos fijos</th>
										<th>Utilidad (%)</th>
										<th>Utilidad</th>
										<th>TOTAL</th>
									</thead>
									<tbody>
										<tr>
											<td>$<span id="total_materiales">0</span></td>
											<td>$<span id="total_mano">0</span></td>
											<td>$<span id="subtotal">0</span></td>
											<td>$<span id="gastosFijos">0</span></td>
											<td><span id="porce_util">0</span></td>
											<td>$<span id="pesos_util"></span>
											<td>$<span id="total">0</span></td>
										</tr>
									</tbody>
								</table>
							</div>
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
		var id=0;
		var items={};
		var subtotal=0;
		function agregarItem(){
			var total_item=$('#cantidad').val()*$('#valorUn').val();
			if($('#tiposMat').val()==='Material'){
				var total=parseInt($('#total_materiales').html())+total_item;
				$('#total_materiales').html(total);
			}else if($('#tiposMat').val()==='Mano de obra'){
				var total=parseInt($('#total_mano').html())+total_item;
				$('#total_mano').html(total);
			}
			subtotal=subtotal+total_item;
			$('#subtotal').html(subtotal);

			var nombre=$('#nombreMat').val();
			var tipo=$('#tiposMat').val();
			var unidad=$('#unidMed').val();
			var cantidad=$('#cantidad').val();
			var valorUn=$('#valorUn').val();
			if(nombre.trim()!=''){
				$('#nombreMat').val('');
				$('#tiposMat').val('');
				$('#unidMed').val('');
				$('#cantidad').val('');
				$('#valorUn').val('');
				items[id]={'id':id,'nombre':nombre,'tipo':tipo,'unidad':unidad,'cantidad':cantidad,'valorUn':valorUn,'total':total_item};
				renderTable();
				id++;
			}
		}

		function renderTable(){
			$('#tabla_detalles').find("tr:gt(0)").remove();  
			for(var c in items){
				var row='';
				row+='<td>'+items[c].id+'</td>';
				row+='<td>'+items[c].nombre+'</td>';
				row+='<td>'+items[c].tipo+'</td>';
				row+='<td>'+items[c].unidad+'</td>';
				row+='<td>'+items[c].cantidad+'</td>';
				row+='<td>'+items[c].valorUn+'</td>';
				row+='<td>'+items[c].total+'</td>';
				row+='<td><button type="button" onclick="remItem('+parseInt(c)+')" class="btn btn-danger">-</button</td>';
				$('#tabla_detalles tr:last').after('<tr id="'+c+'">'+row+'</tr>');
			}
		}

		function remItem(id){
			if (confirm('Seguro de eliminar item seleccionado?')) {
				if(items[id].tipo==='Material'){
				var total=parseInt($('#total_materiales').html())-items[id].total;
				$('#total_materiales').html(total);
				}else if(items[id].tipo==='Mano de obra'){
					var total=parseInt($('#total_mano').html())-items[id].total;
					$('#total_mano').html(total);
				}
				subtotal=subtotal-items[id].total;
				$('#subtotal').html(subtotal);
				delete items[id];
				renderTable();
			}
		}

		function agregaMonto(){
			var gastosF=$('#gastoFijo').val();
			var utilidad=$('#utilidad').val();
			$('#gastosFijos').html(gastosF);
			$('#porce_util').html(utilidad);
			var totalSU=parseInt($('#subtotal').html())+parseInt(gastosF);
			var utilidades=totalSU*(parseInt(utilidad)/100);
			var totalCU=totalSU+utilidades;
			$('#pesos_util').html(utilidades);
			$('#total').html(totalCU);
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
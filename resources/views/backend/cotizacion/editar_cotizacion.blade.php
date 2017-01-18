@extends('master')
@section('titulo','Editar cotización')
@section('contenido')
<script type="text/javascript">
	$(document).ready(function(){
		$('#contactos > option[value={{$cotizacion->id_contacto}}]').attr('selected','selected')
		$('#tiposTrabajos > option[value={{$cotizacion->id_tipo_trabajo}}]').attr('selected','selected')
	});
</script>

<div class="container">
	<div class="col col-md-8 col-md-push-2">
		<div class="well">
			<legend>Editar Cotización</legend>
				<form class="form" method="post" autocomplete="off">
					<fieldset>
						{{csrf_field()}}
						<input type="hidden" name="folio_cotizacion" value="{{$cotizacion->folio_cotizacion}}">
						<div class="form-group">
							<label class="control-label col-md-4">Título</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="titulo" name="titulo" value="{{$cotizacion->nombre}}">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-4">Cliente</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="cliente" name="cliente" value="{{$cotizacion->cliente->nombre}}">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-4">Persona de Contacto</label>
							<div class="col-md-8">
								<select name="contactos" id="contactos" style="width: 300px">
							 		@foreach($cliente->contactos as $c)
										<option value="{{$c->id_contacto}}">{{$c->nombre}} {{$c->apellido}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row">&nbsp;</div>

						<div class="form-group">
							<label class="control-label col-md-4">Tipo de trabajo</label>
							<div class="col-md-8">
								<select name="tiposTrabajos" id="tiposTrabajos" style="width: 300px">
									@foreach($tipo_trabajo as $t)
										<option value="{{$t->id_tipo_trabajo}}">{{$t->nombre}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row">&nbsp;</div>

						<div class="form-group">
							<label class="control-label col-md-4">Descripcion trabajo</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$cotizacion->descripcion_trabajo}}">
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
											@foreach ($cotizacion->items as $item)		
												<tr>
													<td>{{$item->nombre}}</td>
													<td>Ayudante</td>
													<td>Mano de obra</td>
													<td>c/u</td>
													<td>12</td>
													<td>4000</td>
													<td>48.000</td>
												</tr>
											@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
@endsection
@extends('master')
@section('titulo','Editar Trabajo')
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
		<div class="well" >
			<legend>Editar Trabajo</legend>
			<form class="form" method="post" autocomplete="off">
				<fieldset>
					{{csrf_field()}}
					<input type="hidden" name="id_trabajo" value="{{$trabajo->id_trabajo}}">
					<div class="form-group">
						<label class="control-label col-md-3" for="tipo">Estado:</label>
						<div class="col-md-9">
							<select name="estado" style="width: 487px">
								@foreach($estados as $estado)
									@if($estado->id_estado == $trabajo->estado->id_estado)
										<option value="{{$estado->id_estado}}" selected>{{$estado->nombre}}</option>
									@else
										<option value="{{$estado->id_estado}}">{{$estado->nombre}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="row"></div>

					<div class="form-group">
						<label class="control-label col-md-3" for="numero_factura">Documento:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="numero_factura" name="numero_factura" value="{{$trabajo->numero_factura}}">

						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="orden_trabajo">NºOT:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="orden_trabajo" name="orden_trabajo" value="{{$trabajo->orden_trabajo}}">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="fecha_emision_cobro">Emisión cobro:</label>
						<div class="col-md-9">
							<input type="date" class="form-control" id="fecha_emision_cobro" name="fecha_emision_cobro" value="{{$trabajo->fecha_emision_cobro}}">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="orden_compra">OC/NP numero:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="orden_compra" name="orden_compra" value="{{$trabajo->orden_compra}}">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="fecha_pago">Pagado en:</label>
						<div class="col-md-9">
							<input type="date" class="form-control" id="fecha_pago" name="fecha_pago" value="{{$trabajo->fecha_pago}}">
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-md-3" for="receptor_factura">Enviar factura a:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="receptor_factura" name="receptor_factura" value="{{$trabajo->receptor_factura}}">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="comentario">Comentario:</label>
						<div class="col-md-9" h>
							<textarea cols=60 rows=10 name="comentario">{{$trabajo->comentario}}</textarea>
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

@endsection
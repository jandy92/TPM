@extends('master')
@section('title','Nuevo trabajo')
@section('content')
<div class="container"> 
	<div class="col col-lg-8 col-lg-push-2">
		<div class="well">
			<legend>Nuevo trabajo</legend>
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
			<form class="form" method="post" autocomplete="off">
				<fieldset>
					{{csrf_field()}}
					<div class="form-group">
						<label for="titulo" class="label-control col-lg-2">*Título:</label>
						<div class="form-group col-lg-4">
							<input type="text" name="titulo" class="form-control" required>
						</div>
						<label class="label-control col-lg-2">N° folio cotización:</label>
						<div class="form-group col-lg-4">
							@if($folio==-1)
							<input type="text" name="folio" class="form-control">
							@else
							<input type="text" name="folio" class="form-control" required readonly value="{{$folio}}">
							@endif
						</div>
					</div>

					<div class="form-group">
						<label for="descripcion" class="label-control col-lg-2">Descripción:</label>
						<div class="col-lg-10">
							<textarea name="descripcion" class="form-control" rows="3"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="ot" class="label-control col-lg-2">N° OT:</label>
						<div class="form-group col-lg-4">
							<input type="text" name="ot" class="form-control ">
						</div>	
						<label for="oc" class="label-control col-lg-2">N° Orden de compra:</label>
						<div class="form-group col-lg-4">
							<input type="text" name="oc" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="numfac" class="label-control col-lg-2">N° factura:</label>
						<div class="form-group col-lg-4">
							<input type="text" name="numfac" class="form-control">
						</div>
						<label for="utilidad" class="label-control col-lg-2">*Utilidad (%):</label>
						<div class="form-group col-lg-4">
							<input type="number" name="utilidad" class="form-control" required value="0">
						</div>
					</div>

					<div class="form-group">
						<label class="label-control col-lg-3">Fecha emision cobro:</label>
						<div class="form-group col-lg-3">
							<input class="form-control" type="date" name="fecha_emision">
						</div>

						<label class="label-control col-lg-3">Fecha pago:</label>
						<div class="form-group col-lg-3">
							<input class="form-control" type="date" name="fecha_pago">
						</div>
					</div>
				</fieldset>
				<div class="form-group">
					<a class="btn btn-warning" href="#">Volver a lista de trabajos</a>
					<button type="submit" class="btn btn-success">Crear nuevo trabajo</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
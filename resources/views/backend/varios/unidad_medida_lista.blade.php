@extends('master')
@section('titulo','Unidades de medida')
@section('contenido')
<div class="container">
	<div class="col col-md-8 col-md-push-2">

		<div class="well">
			<legend>Unidades de medida</legend>
			<form class="form" id="form" method="post" autocomplete="off">
				<fieldset>
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-label col-md-3" for="nombre">Nombre:</label>
						<div class="col-md-6">
							<input type="text" class="form-control" id="nombre" name="nombre">
						</div>
						<div class="col-md-3">
							<button type="button" class="btn btn-primary">Agregar</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>	
@endsection
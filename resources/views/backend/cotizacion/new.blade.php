@extends('master')
@section('title','Nueva cotizacion')
@section('content')
<div class="container">
	<div class="col col-md-8 col-md-push-2">
		<div class="well">
			<legend>Nueva cotizacion</legend>
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
		@if($clients->isEmpty()||$contacts->isEmpty())
			<div class="alert alert-warning">
				No se podrá realizar esta operación, ya que:
				@if($clients->isEmpty())
					<li>No hay clientes registrados.</li>
				@endif
				@if($contacts->isEmpty())
					<li>No hay contactos registrados.</li>
				@endif
			</div>
		@endif
			<form class="form" method="post" autocomplete="off">
				<fieldset>
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-label col-md-2" for="titilo">Título:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="titulo" name="titulo">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="cliente">Cliente:</label>
						<div class="col-md-10">
							<select  class="form-control" name="cliente">
								@foreach($clients as $cli)
								<option value="{{$cli->rut}}">{{$cli->nombre}} [{{$cli->rut}}]</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="contacto">Persona de contacto:</label>
						<div class="col-md-10">
							<select  class="form-control" name="contacto">
								@foreach($contacts as $cont)
								<option value="{{$cont->rut}}">{{$cont->nombre}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</fieldset>
					<div class="form-group">
						<div class="alert alert-info">
							Luego de crear una cotización, podrá posteriormente asignar trabajos a ella.		
						</div>
					</div>
					<div class="form-group">
						<a class="btn btn-warning" href="{{action('PagesController@showCotizacionesList')}}">Volver a lista de cotizaciones</a>
						<button class="btn btn-success" type="submit">Crear cotización</button>
					</div>
			</form>
		</div>
	</div>
</div>
@endsection
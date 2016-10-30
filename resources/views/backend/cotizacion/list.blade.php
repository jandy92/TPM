@extends('master')
@section('title','Lista de Cotizaciones')
@section('content')
<style type="text/css">
	.item-btn{
		font-size: 12px;
		padding:4px;
		width: 100%;
	}
</style>
<div class="container">
	<div class="col">
		<a href="{{action('PagesController@showFormularioCotizacion')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Crear nueva cotización</a>
	</div>
	<div class="well well-lg-8-push-2">
		<legend>Lista de cotizaciones</legend>
	<div class="table-responsive">
		@if(isset($cots)&&!$cots->isEmpty())
			<table class="table table-responsive table-bordered">
				<thead>
					<th>N° Folio</th>
					<th>Título</th>
					<th>Cliente</th>
					<th>Contacto</th>
					<th>Creación</th>
					<th>Última modificación</th>
				</thead>
				<tbody>
					@foreach($cots as $cot)
						<tr>
							<td>{{sprintf("%015d",$cot->folio)}}</td>
							<td>
							<a href="{{action('PagesController@showCotizacionDetail',$cot->folio)}}" class="btn btn-primary item-btn">
							{{$cot->titulo}}
							</a>
							</td>
							<td>
							<a href="#" class="btn btn-info item-btn">
							{{App\Cliente::whereRut($cot->rut_cliente)->first()->nombre}}
							</a>
							</td>
							<td><a class="btn btn-info item-btn"  href="{{action('ContactsController@showDetails',$cot->rut_contacto)}}">{{App\Contacto::whereRut($cot->rut_contacto)->first()->nombre}}</a></td>
							<td>{{$cot->created_at}}</td>
							<td>{{$cot->updated_at}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@else
			No existen cotizaciones registradas
		@endif
	</div>
</div>
@endsection
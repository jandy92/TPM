@extends('master')
@section('title','Lista de Trabajos')
@section('content')
<div class="container">
	<div class="well well-lg-8-push-2">
		<legend>Lista de trabajos</legend>
		@if(isset($jobs)&&!$jobs->isEmpty())
			<div class="table-responsive">	
				<table class="table">
					<thead>
						<th>ID</th>
						<th>Título</th>
						<th>Descripción</th>
						<th>Estado</th>
						<th></th>
					</thead>
					@foreach($jobs as $job)
						<tr>
							<td>{{$job->id}}</td>
							<td>{{$job->titulo}}</td>
							<td>{{$job->descripcion}}</td>
							<td>NOT_YET</td>
							<td><a class="btn btn-primary" href="#">Detalles...</a></td>
						</tr>
					@endforeach
				</table>
			</div>
		@else
			<div class="container">No Existen trabajos</div>
		@endif
	</div>
</div>
@endsection
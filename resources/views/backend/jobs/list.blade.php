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
							<td>
									@if($job->estado)
										@if($job->estado->color)
											<td style="background-color:{{$job->estado->color}};">
										@else
											<td>
										@endif
									{{$job->estado->nombre}}
									@else
									<td>
									Sin estado asignado
									@endif
							</td>
							<td><a class="btn btn-primary" href="{{action('PagesController@showTrabajoDetail',$job->id)}}">Detalles...</a></td>
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
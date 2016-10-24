@extends('master')
@section('title','Roles y permisos')
@section('content')
<style type="text/css">
	.btn{
		padding:  5px;
		white-space: normal;
		text-transform: capitalize;
		font-size: 14px;
	}

	.expand{
		width: 100%;
	}

	th{
		text-align: center;
		max-width: 20px;
	}

	.ok{
		color: green;
		font-size: 25px;
		display:block;
		text-align: center;
	}

	.nope{
		color: red;
		font-size: 25px;
		display:block;
		text-align: center;
	}
</style>
<div class="container">
	<div class="well">
		<legend>Tabla de roles y permisos</legend>
		<h6>- Para más información, puede mantener el cursor sobre el botón de cada <button class="btn btn-info">rol</button> ó <button class="btn btn-warning">permiso</button>.</h6>
		@permission('admin_rolPerm')
		<h6>- Puede administrar roles y permisos presionando los sobre el <button class="btn btn-info">rol</button> ó <button class="btn btn-warning">permiso</button> correspondiente.</h6>
		@endpermission
		<table class="table table-striped table-responsive table-bordered">
		<tr>
		<th class="info"></th>
		@foreach($roles as $r)
		<th class="info"> 
		@if(Auth::user()->can('admin_rolPerm'))
		<a href="{{action('RolesPermissionsController@showRoleEditForm',$r->name)}}" class="btn btn-info expand" data-toggle="tooltip" title="{{$r->description}}">{{$r->display_name}}</a>
		@else
		<button class="btn btn-info expand" data-toggle="tooltip" title="{{$r->description}}">{{$r->display_name}}</button>
		@endif
		</th>	
		@endforeach
		</tr>
		@foreach($perms as $p)
			<tr>
			<th class="info">
			@if(Auth::user()->can('admin_rolPerm'))
				<a href="#" class="btn btn-warning expand" data-toggle="tooltip" title="{{$p->description}}"> {{$p->display_name}} </a>
			@else
				<button class="btn btn-warning expand" data-toggle="tooltip" title="{{$p->description}}"> {{$p->display_name}} </button>
			@endif
			</th>
			@foreach($roles as $role)
				@if($role->hasPermission($p->name))
					<td class="success"><span class="glyphicon glyphicon-ok-sign ok"></span></td>
				@else
					<td class="warning"><span class="glyphicon glyphicon-remove-circle nope"></span></td>
				@endif
			@endforeach
			</tr>
		@endforeach
		</table>
	</div>
</div>
@endsection
@extends('master')
@section('titulo','Lista de clientes')
@section('contenido')
<div class="container">
	<div class="col">
		<a href="{{action('ControladorCliente@nuevoClienteForm')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Registrar nuevo cliente</a>
	</div>
	<div class="well">
		<legend>Lista de clientes</legend>
		@if(isset($clientes)&&!$clientes->isEmpty())
			<table class="table table-hover table-striped table-condensed table-responsive  ">
				<thead>
					<th>R.U.T</th>
					<th>Razón Social</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Giro</th>
					<th></th>
				</thead>
				<tbody>
				<form >
				<input class="form-control" placeholder="filtrar por nombre" onkeyup="filtrarClientes()" type="search" name="filtro" id="filtro">
				</form>
					@foreach($clientes as $cli)
					<tr>
						<td>{{$cli->rut_cliente}}</td>
						<td>{{$cli->nombre}}</td>
						<td>{{$cli->direccion}}</td>
						<td>{{$cli->telefono}}</td>
						<td>{{$cli->giro}}</td>
						<td>
							<a class="btn btn-link" style="color:green" href="{{action('ControladorCliente@editarClienteForm',$cli->id_cliente)}}">Editar</a>
							<a class="btn btn-link" style="color:blue" href="#">informacion</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			No existen clientes registrados
		@endif
	</div>
</div>
<script type="text/javascript">
	var clientes_filtrados=[];
	function filtrarClientes(){
		if($('#filtro').val()!=''){
			console.log($('#filtro').val());
		}
		var url_="{{action('ControladorCliente@AJAX_contactosDeCliente','#VALUE')}}".replace('#VALUE',$('#filtro').val());
		console.log(url_);
		$.ajax(
			{
				url: url_,
				async: false,//importante
				success: function(result){
        		clientes_filtrados=JSON.parse(JSON.stringify(result));
    		},error:function (xhr, ajaxOptions, thrownError) {
	        console.log(xhr.status);
	        console.log(thrownError);
      		}
    	});

    	console.log(clientes_filtrados);
	}
</script>
@endsection
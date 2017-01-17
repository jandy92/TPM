@extends('master')
@section('titulo','Lista de clientes')
@section('contenido')
<script type="text/javascript">
	var trabajos_filtrados=[];
	var trabajos=[];
</script>
<div class="container">
	<div class="col">
	</div>
	<div class="well">
		<legend>Lista de clientes</legend>
		@if(isset($trabajo)&&!$trabajo->isEmpty())
			<table id="table" class="table table-hover table-striped table-condensed table-responsive  ">
				<thead>
					<th>Nº Factura</th>
					<th>Emision cobro</th>
					<th>Fecha de pago</th>
					<th>Estado</th>
					<th>Pagado a</th>
					<th></th>
				</thead>
				<tbody id="tbody">
				<form >
				<input class="form-control" placeholder="filtrar por nombre o rut" onkeyup="filtrarClientes()" type="search" name="filtro" id="filtro">
				</form>

					@foreach($trabajo as $cli)
					<script type="text/javascript">
						tmp_c={
							numero_factura:"{{$cli->numero_factura}}",
							fecha_emision_cobro:"{{$cli->fecha_emision_cobro}}",
							fecha_pago:"{{$cli->fecha_pago}}",
							id_estado:"{{$cli->estado->nombre}}",
							receptor_factura:"{{$cli->receptor_factura}}",
						};
						trabajos.push(tmp_c);
					</script>
					<tr>
						<td>{{$cli->numero_factura}}</td>
						<td>{{$cli->fecha_emision_cobro}}</td>
						<td>{{$cli->fecha_pago}}</td>
						<td>{{$cli->estado->nombre}}</td>
						<td>{{$cli->receptor_factura}}</td>
						<td>
							<a class="btn btn-link" style="color:green" href="{{action('ControladorTrabajo@editarTrabajoForm',$cli->id_trabajo)}}">Editar</a>
							<a class="btn btn-link" style="color:blue" href="#">Informacion</a>
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
	function filtrarClientes(){
		if($('#filtro').val()!=''){
			console.log($('#filtro').val());
			var url_="{{action('ControladorCliente@AJAX_busquedaClientes','#VALUE')}}".replace('#VALUE',$('#filtro').val());
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
	    	//console.log(clientes_filtrados);
	    	$("#table > tbody").empty();
	    	for(i in clientes_filtrados){
	    		c=clientes_filtrados[i];
	    		edit="{{action('ControladorCliente@editarClienteForm','#ID_CLIENTE')}}".replace("#ID_CLIENTE",c.id_cliente);
	    		info="#";
	    		//info="{{action('ControladorCliente@editarClienteForm','#ID_CLIENTE')}}".replace("#ID_CLIENTE",c.id_cliente);
	    		row="<tr>";
	    		row+="<td>"+c.rut_cliente+"</td>";
	    		row+="<td>"+c.nombre+"</td>";
	    		row+="<td>"+c.direccion+"</td>";
	    		row+="<td>"+c.telefono+"</td>";
	    		row+="<td>"+c.giro+"</td>";
				row+="<td>";
				row+='<a class="btn btn-link" style="color:green" href="#LINK">Editar</a>'.replace("#LINK",edit);
				row+='<a class="btn btn-link" style="color:blue" href="#LINK">Informacion</a>'.replace("#LINK",info);
				row+="</td>";
	    		row+="</tr>";
	    		$("#table > tbody").append(row);
	    	}
		}else{
			$("#table > tbody").empty();
	    	for(i in clientes){
	    		c=clientes[i];
				edit="{{action('ControladorCliente@editarClienteForm','#ID_CLIENTE')}}".replace("#ID_CLIENTE",c.id_cliente);
	    		info="#";
	    		//info="{{action('ControladorCliente@editarClienteForm','#ID_CLIENTE')}}".replace("#ID_CLIENTE",c.id_cliente);
	    		row="<tr>";
	    		row+="<td>"+c.rut_cliente+"</td>";
	    		row+="<td>"+c.nombre+"</td>";
	    		row+="<td>"+c.direccion+"</td>";
	    		row+="<td>"+c.telefono+"</td>";
	    		row+="<td>"+c.giro+"</td>";
				row+="<td>";
				row+='<a class="btn btn-link" style="color:green" href="#LINK">Editar</a>'.replace("#LINK",edit);
				row+='<a class="btn btn-link" style="color:blue" href="#LINK">Informacion</a>'.replace("#LINK",info);
				row+="</td>";
	    		row+="</tr>";
	    		$("#table > tbody").append(row);
	    	}
		}
	}
</script>
@endsection
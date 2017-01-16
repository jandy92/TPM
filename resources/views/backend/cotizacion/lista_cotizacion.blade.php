@extends('master')
@section('titulo','Lista de Cotizaciones')
@section('contenido')

<script type="text/javascript">
	var cotizaciones_filtradas=[];
	var cotizaciones=[];
</script>

<div class="container">
	<div class="col">
		<a href="{{action('ControladorCotizacion@nuevaCotizacionForm')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Crear nueva cotización</a>
	</div>
	<div class="well well-lg-8-push-2">
		<legend>Lista de cotizaciones</legend>
	<div class="table-responsive">
		@if(isset($cotizacion)&&!$cotizacion->isEmpty())
			<table class="table table-responsive table-bordered">
				<thead>
					<th>N° Folio</th>
					<th>Título</th>
					<th>Cliente</th>
					<th>Contacto</th>
					<th>Tipo de trabajo</th>
					<th>Detalle</th>
					<th>PDF</th>
					<th>Aceptar Cotización</th>
					<th></th>
				</thead>
				<tbody id="tbody">
				<form >
				<input class="form-control" placeholder="filtrar por titulo o numero de folio" onkeyup="filtrarCotizacion()" type="search" name="filtro" id="filtro">
				</form>

					@foreach($cotizacion as $cot)
					<script type="text/javascript">
						tmp_c={
							folio_cotizacion:"{{$cot->folio_cotizacion}}",
							titulo:"{{$cot->nombre}}",
							cliente:"{{$cot->id_cliente}}",
							tipo_trabajo:"{{$cot->id_tipo_trabajo}}",
							detalle:"{{$cot->descripcion_trabajo}}",
							pdf:"NADA",
							aceptar: "ACEPTAR",
						};
						cotizaciones.push(tmp_c);
					</script>
					<tr>
						<td>{{$cot->folio_cotizacion}}</td>
						<td>{{$cot->nombre}}</td>

						<td>{{$cot->cliente->nombre}}</td>
						<td>{{$cot->contacto->nombre}}</td>
						<td>{{$cot->tipo_trabajo->nombre}}</td>
						
						<td>{{$cot->descripcion_trabajo}}</td>
						<td><a class="btn btn-link" style="color:red" href="#">PDF</a></td>
						<td> ACEPTAR </td>
						<td>
							<a class="btn btn-link" style="color:green" href="#">Editar</a>
							<a class="btn btn-link" style="color:blue" href="#">Información</a>
						</td>
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
<script type="text/javascript">
	function filtrarCotizacion(){
		if($('#filtro').val()!=''){
			var url_="{{action('ControladorCotizacion@busquedaCotizacion','#VALUE')}}".replace('#VALUE',$('#filtro').val());
			$.ajax(
				{
					url: url_,
					async: false,//importante
					success: function(result){
	        		cotizaciones_filtradas=JSON.parse(JSON.stringify(result));
	    		},error:function (xhr, ajaxOptions, thrownError) {
		        console.log(xhr.status);
		        console.log(thrownError);
	      		}
	    	});

	    	$("#table > tbody").empty();

	    	for(i in cotizaciones_filtradas){
	    		c=cotizaciones_filtradas[i];
	    		//funcion para generar boton editar
	    		edit="#";
	    		//funcion para generar boton informacion
	    		info="#";

	    		row="<tr>";
	    		row+="<td>"+c.folio_cotizacion+"</td>";
	    		row+="<td>"+c.nombre+"</td>";
	    		row+="<td>"+c.rut_cliente+"</td>";
	    		row+="<td>"+c.tipo_trabajo+"</td>";
	    		row+="<td>"+c.descripcion_trabajo+"</td>";
				row+="<td>";
				row+='<a class="btn btn-link" style="color:green" href="#LINK">Editar</a>'.replace("#LINK",edit);
				row+='<a class="btn btn-link" style="color:blue" href="#LINK">Informacion</a>'.replace("#LINK",info);
				row+="</td>";
	    		row+="</tr>";
	    		$("#table > tbody").append(row);
	    	}
		}else{
			$("#table > tbody").empty();
	    	for(i in cotizaciones){
	    		c=cotizaciones[i];
				edit="#";
	    		info="#";
	    		//info="{{action('ControladorCliente@editarClienteForm','#ID_CLIENTE')}}".replace("#ID_CLIENTE",c.id_cliente);
	    		row="<tr>";
	    		row+="<td>"+c.folio_cotizacion+"</td>";
	    		row+="<td>"+c.nombre+"</td>";
	    		row+="<td>"+c.rut_cliente+"</td>";
	    		row+="<td>"+c.tipo_trabajo+"</td>";
	    		row+="<td>"+c.descripcion_trabajo+"</td>";
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
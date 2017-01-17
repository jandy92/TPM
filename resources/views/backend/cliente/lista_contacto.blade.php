@extends('master')
@section('titulo','Lista de contactos')
@section('contenido')
<script type="text/javascript">
	var contactos_filtradas=[];
	var contactos=[];
</script>

<div class="container">
	<div class="well">
		<legend>Lista de contactos</legend>
		<div class="table-responsive">
		@if(isset($contactos)&&!$contactos->isEmpty())
			<table id="table" class="table table-hover table-striped table-condensed table-responsive  ">
				<thead>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Email</th>
					<th>Teléfono</th>
					<th></th>
				</thead>
				<tbody id="tbody">
				<form >
				<input class="form-control" placeholder="Buscar..." onkeyup ="filtrarContacto()" type="search" name="filtro" id="filtro">
				</form>
					@foreach($contactos as $cont)
					<script type="text/javascript">
						tmp_c={
							nombre:"{{$cont->nombre}}",
							apellido:"{{$cont->apellido}}",
							email:"{{$cont->email}}",
							telefono:"{{$cont->telefono}}"
						};
						contactos.push(tmp_c);
					</script>

					<tr>
						<td>{{$cont->nombre}}</td>
						<td>{{$cont->apellido}}</td>
						<td>{{$cont->email}}</td>
						<td>{{$cont->telefono}}</td>
						<td>
							<a href="{{action('ControladorContacto@editarContactoForm',$cont->id_contacto)}}" class="btn btn-link" style="color:green" href="">Editar</a>
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			No existen contactos registrados
		@endif
		</div>

	</div>
</div>
<script type="text/javascript">

	function filtrarContacto(){
		if($('#filtro').val()!=''){
			//console.log($('#filtro').val());
			var url_="{{action('ControladorContacto@buscarContacto','#VALUE')}}".replace('#VALUE',$('#filtro').val());
			$.ajax(
				{
					url: url_,
					async: false,
					success: function(result){
	        		contactos_filtradas=JSON.parse(JSON.stringify(result));
	        		//console.log(contactos_filtradas);
	    		},error:function (xhr, ajaxOptions, thrownError) {
		        console.log(xhr.status);
		        console.log(thrownError);
	      		}
	    	});

	    	$("#table > tbody").empty();

	    	for(i in contactos_filtradas){
	    		c=contactos_filtradas[i];
	    		//funcion para generar boton informacion
	    		edit="#";

	    		row="<tr>";
	    		row+="<td>"+c.nombre+"</td>";
	    		row+="<td>"+c.apellido+"</td>";
	    		row+="<td>"+c.email+"</td>";
	    		row+="<td>"+c.telefono+"</td>";
				row+="<td>";
				row+='<a class="btn btn-link" style="color:green" href="#LINK">Editar</a>'.replace("#LINK",edit);
				row+="</td>";
	    		row+="</tr>";
	    		$("#table > tbody").append(row);
	    	}

		}else{
			$("#table > tbody").empty();
	    	for(i in contactos){
	    		c=contactos[i];
				edit="#";
				row="<tr>";
	    		row+="<td>"+c.nombre+"</td>";
	    		row+="<td>"+c.apellido+"</td>";
	    		row+="<td>"+c.email+"</td>";
	    		row+="<td>"+c.telefono+"</td>";
				row+="<td>";
				row+='<a class="btn btn-link" style="color:green" href="#LINK">Editar</a>'.replace("#LINK",edit);
				row+="</td>";
	    		row+="</tr>";
	    		$("#table > tbody").append(row);
	    	}
		}
	}


</script>
@endsection
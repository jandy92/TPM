@extends('master')
@section('titulo','Editar cliente')
@section('contenido')
	<div class = "container">
		<div class = "col col-md-8 col-md-push-2">
			<div class = "well">
				<legend>Editar Cliente</legend>
				@foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
                @endforeach 
				<form class="form" id="form" method="post" autocomplete="on" onsubmit="return submit_form()">
					<fieldset>
						{{csrf_field()}}
						<input type="hidden" name="id_cliente" value="{{$cliente->id_cliente}}">
					<div class="form-group">
						<label class="control-label col-md-3" for="rut">R.U.T:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="rut" name="rut" value="" placeholder="Mantener {{$cliente->rut_cliente}}"> 
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="nombre">Razón Social:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="nombre" name="nombre" value= "{{$cliente->nombre}}">
						</div>
					</div>

					<div class="row"></div>

					<div class="form-group">
						<label class="control-label col-md-3" for="giro">Giro:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="giro" name="giro" value="{{$cliente->giro}}">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="direccion">Dirección:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="direccion" name="direccion" value="{{$cliente->direccion}}">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="telefono">Teléfono:</label>
						<div class="col-md-9">
							<input type="phone" class="form-control" id="telefono" name="telefono" value="{{$cliente->telefono}}">
						</div>
					</div>

					<div class="row">&nbsp;</div>
					<div class="col">

					<div class="row">&nbsp;</div>
						<label>Personas de contacto</label>
					<div class="col">
						<button type="button" class="btn btn-primary" onclick="showModal()">Asociar contacto</button>
						<div class="panel panel-default">
	  						<div class="panel-body">
	  							<div class="table-responsive">
	  								<table class="table" id="tabla_contactos">
  										<thead>
  											<th>Nombre</th>
  											<th>Teléfono</th>
  											<th>Email</th>
  											<th></th>
  										</thead>
	  								</table>
	  							</div>
							</div>
						</div>
					</div>
					</div>
				<div class="form-group">
					<div class="col-md-12 col-md-push-8">
						<div class="row">&nbsp;</div>
						<button type="submit" class="btn btn-success">Editar</button>
						&nbsp;
						<a href="{{action('ControladorCliente@listaDeCliente')}}" class="btn btn-warning">Cancelar</a>
					</div>
				</div>
				<div id="contactos">
					
				</div>
					</fieldset> 
				</form>
			</div>
		</div>
	</div>


<div class="modal fade" id="basicModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <!--button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button-->
            <h4 class="modal-title" id="myModalLabel">Administrar Contactos</h4>
            </div>
            <div class="modal-body">
            	<div class="well">
            		<div class="row">
		            	<div class="form-group">            		
		            		<div class="col-md-12">
		                		<input onkeyup="listaContactos()"  id="input_filter_contactos" type="text" class="form-control" placeholder="Filtrar por nombre o apellido" name="">
		            		</div>
		            	</div>
	            	</div>
            	</div>

            	<div class="well">
	            	<div class="row">
		            	<div class="form-group">
		            		<div id="modal_result">
		            			<table class="table" id="modal_tabla_contactos">
		            				<thead>
		            					<th>Nombre</th>
		            					<th>Teléfono</th>
		            					<th>E-mail</th>
		            					<th>Acción</th>
		            				</thead>
		            				<tbody>
		            					
		            				</tbody>
		            			</table>
		            		</div>
		            	</div>
	            	</div>
            	</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <!--button type="button" class="btn btn-primary">Seleccionar</button-->
        </div>
    </div>
  </div>
</div>


		<script type="text/javascript">
			var contactos=[];
	var contactos_asignados=[];
	var contactos_filtrados=[];

	@foreach($cliente->contactos as $c)
		temp={};
		temp.id={{$c->id_contacto}};
		temp.telefono='{{$c->telefono}}';
		temp.email='{{$c->email}}';
		temp.nombre='{{$c->nombre}}';
		temp.apellido='{{$c->apellido}}';
		contactos_asignados.push(temp);
	@endforeach

	@foreach($contactos as $c)
		temp={};
		temp.linked=false;
		temp.id={{$c->id_contacto}};
		temp.telefono='{{$c->telefono}}';
		temp.email='{{$c->email}}';
		temp.nombre='{{$c->nombre}}';
		temp.apellido='{{$c->apellido}}';
		contactos.push(temp);
	@endforeach

	for(i in contactos_asignados){
		c1=contactos_asignados[i];
		for(j in contactos){
			c2=contactos[j];
			if(c1.id===c2.id){
				c2.linked=true;
			}else{
				c2.linked=false;
			}
		}
	}

	function listaContactos(){
		if($('#input_filter_contactos').val().length>0){
			filter_contactos();
		}else{
			show_contactos();
		}
	}

	function filter_contactos(){
		contactos_filtrados=[];
		$('#modal_tabla_contactos > tbody').empty();
		filtro=$('#input_filter_contactos').val().toLowerCase();
		for(i in contactos){
			c=contactos[i];
			if(c.nombre.toLowerCase().indexOf(filtro)>=0 || c.apellido.toLowerCase().indexOf(filtro)>=0){
				row="<tr>";
				row+="<td>";
				row+=c.nombre+" ";
				row+=c.apellido;
				row+="</td>";
				row+="<td>";
				row+=c.telefono;
				row+="</td>";
				row+="<td>";
				row+=c.email;
				row+="</td>";
				row+="<td>";
				if(!c.linked){
					row+="<a id='link_asociar_contacto_"+c.id+"' style='color:blue;cursor:pointer;' onclick='asociarContacto("+c.id+")'>Asociar</a>";
				}
				row+="</td>";
				row+="</tr>";
				$('#modal_tabla_contactos').append(row);
			}
		}
	}

	function show_contactos(){
		$('#modal_tabla_contactos > tbody').empty();
		for(i in contactos){
			c=contactos[i];
			row="<tr>";
				row+="<td>";
				row+=c.nombre+" ";
				row+=c.apellido;
				row+="</td>";
				row+="<td>";
				row+=c.telefono;
				row+="</td>";
				row+="<td>";
				row+=c.email;
				row+="</td>";
				row+="<td>";
				if(!c.linked){
					row+="<a id='link_asociar_contacto_"+c.id+"' style='color:blue;cursor:pointer;' onclick='asociarContacto("+c.id+")'>Asociar</a>";
				}
				row+="</td>";
			row+="</tr>";
			$('#modal_tabla_contactos').append(row);
		}
	}
	
	function showModal(){
		$('#input_filter_contactos').focus();
		$('#basicModal').modal('show');
	}

	function asociarContacto(id){
		//console.log(id);
		found=false;
		for(i in contactos_asignados){
			c=contactos_asignados[i];
			if(c.id===id){
				found=true;
				break;
			}
		}
		if(!found){
			for(i in contactos){
				c=contactos[i];
				if(c.id===id){
					$("#link_asociar_contacto_"+id).css('visibility','hidden');
					contactos_asignados.push(c);
					c.linked=true;
					renderFormTable();	
					break;
				}
			}
		}
	}


	function desasociarContacto(id){
		for(i in contactos_asignados){
			//console.log(i);
			c=contactos_asignados[i];
			if(c.id===id){
				$('#link_asociar_contacto_'+id).css('visibility','visible');
				if(i!=0){
					contactos_asignados.splice(i,i);
					renderFormTable();
					break;		
				}else{
					contactos_asignados.shift();
					renderFormTable();
					break;
				}
			}
		}
		for(i in contactos){
			c=contactos[i];
			if(c.id===id){
				c.linked=false;
				console.log(c);
			}
		}
		show_contactos();
	}


	function renderFormTable(){
		$('#tabla_contactos > tbody').empty();
		for(i in contactos_asignados){
			c=contactos_asignados[i];
			row="<tr>";
				row+="<td>";
				row+=c.nombre+" ";
				row+=c.apellido;
				row+="</td>";
				row+="<td>";
				row+=c.telefono;
				row+="</td>";
				row+="<td>";
				row+=c.email;
				row+="</td>";
				row+="<td>";
				row+="<a id='link_desasociar_contacto_"+c.id+"' onclick='desasociarContacto("+c.id+")' style='color:red;cursor:pointer;' >des-asociar</a>";
				row+="</td>";
			row+="</tr>";
			$('#tabla_contactos').append(row);
		}
	}

	function submit_form(){
		for(i in contactos_asignados){
			c=contactos_asignados[i];
			input="<input type='hidden' name='contactos[]' value="+c.id+"";
			input+=">"
			$('#contactos').append(input);
		}
		//return false;
	}



	show_contactos();
	renderFormTable();
		</script>
@endsection
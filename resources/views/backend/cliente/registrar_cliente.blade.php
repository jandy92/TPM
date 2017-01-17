@extends('master')
@section('titulo','Registrar cliente')
@section('contenido')
<div class="container">
	<div class="col col-md-8 col-md-push-2">
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
		<div class="well">
			<legend>Registrar cliente</legend>
			<form class="form" id="form" method="post" autocomplete="on" onsubmit="return submit_form()">
				<fieldset>
					{{csrf_field()}}
					<div class="form-group">
						<label class="control-label col-md-3" for="rut">R.U.T:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="rut" name="rut">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="nombre">Razón Social:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="nombre" name="nombre">
						</div>
					</div>

					<div class="row"></div>

					<div class="form-group">
						<label class="control-label col-md-3" for="giro">Giro:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="giro" name="giro">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3" for="direccion">Dirección:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="direccion" name="direccion">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" for="telefono">Teléfono:</label>
						<div class="col-md-9">
							<input type="phone" class="form-control" id="telefono" name="telefono">
						</div>
					</div>
					<button type="button" class="btn btn-primary" onclick="showModal()">Asociar contacto</button>


					<div class="row">&nbsp;</div>
					<div class="col">
						<label>Personas de contacto</label>
						<div class="panel panel-default">
	  						<div class="panel-body">
	  							<div class="table-responsive">
	  								<table class="table" id="tabla_contactos">
  										<thead>
  											<th>Nombre</th>
  											<th>Apellido</th>
  											<th>Email</th>
  											<th>Teléfono</th>
  											<th></th>
  										</thead>
	  								</table>
	  							</div>
							</div>
						</div>
					</div>
		
				<div class="form-group">
					<div class="col-md-12 col-md-push-8">
						<div class="row">&nbsp;</div>
						<button type="submit" class="btn btn-success">Registrar</button>
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
	@foreach($contactos as $c)
		temp={};
		temp.id={{$c->id_contacto}};
		temp.telefono='{{$c->telefono}}';
		temp.email='{{$c->email}}';
		temp.nombre='{{$c->nombre}}';
		temp.apellido='{{$c->apellido}}';
		contactos.push(temp);
	@endforeach


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
				row+="<a id='link_asociar_contacto_"+c.id+"' style='color:blue;cursor:pointer;' onclick='asociarContacto("+c.id+")'>Asociar</a>";
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
				row+="<a id='link_asociar_contacto_"+c.id+"' style='color:blue;cursor:pointer;' onclick='asociarContacto("+c.id+")'>Asociar</a>";
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
	}
	show_contactos();
</script>
@endsection
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"> <span class="glyphicon glyphicon-home"> </span> - TPM</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      @if(Auth::user()->hasRole('user'))
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{action('ControladorCliente@nuevoClienteForm')}}">Registrar cliente</a></li>                      
            <li role="separator" class="divider"></li>
            <li><a href="{{action('ControladorCliente@listaDeCliente')}}">Lista de clientes</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contactos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{action('ControladorCliente@nuevoContactoForm')}}">Registrar contacto</a></li>                      
            <li role="separator" class="divider"></li>
            <li><a href="{{action('ControladorCliente@listaDeContacto')}}">Lista de contactos</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cotizaciones y trabajos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{action('ControladorCotizacion@nuevaCotizacionForm')}}">Crear cotización</a></li>                   
            <li role="separator" class="divider"></li>
            <li><a href="{{action('ControladorCotizacion@listaCotizacion')}}">Lista de cotizaciones</a></li>
            <li><a href="{{action('ControladorTrabajo@listaDeTrabajo')}}">Lista de trabajos</a></li>
          </ul>
        </li>
        
        @endif
        @if(Auth::user()->hasRole('admin'))
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administración <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{action('ControladorUsuario@listaUsuario')}}">Usuarios</a></li>
            <li><a href="#">Roles y permisos</a></li>
          </ul>
        </li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Utilidades <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{action('ControladorTipoTrabajo@tipoTrabajoForm')}}">Tipo de trabajo</a></li>
            <li><a href="{{action('ControladorVarios@unidades_de_medida_lista')}}">Unidades de medida</a></li>
          </ul>
        </li>
        @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!--li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li-->
            <li><a href="/logout">
                Cerrar sesión
                </a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
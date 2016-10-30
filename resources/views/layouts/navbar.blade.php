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
      <a class="navbar-brand" href="{{action('PagesController@index')}}">TPM Ingeniería</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li-->
        
        @if(Auth::user()->can('admin_cot')||Auth::user()->can('admin_trab'))
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cotizaciones y trabajos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            @permission('admin_cot')
            <li><a href="{{action('PagesController@showFormularioCotizacion')}}">Nueva Cotizacion</a></li>
            @endpermission
            @permission('admin_trab')
            <li><a href="{{action('PagesController@showFormularioNuevoTrabajo')}}">Nuevo Trabajo</a></li>
            @endpermission
            <li role="separator" class="divider"></li>
            @permission('admin_cot')
            <li><a href="{{action('PagesController@showCotizacionesList')}}">Ver cotizaciones</a></li>
            @endpermission
            @permission('admin_trab')
            <li><a href="{{action('PagesController@showTrabajosList')}}">Ver trabajos</a></li>
            @endpermission
          </ul>
        </li>
        @endif
        @permission('admin_clicont')
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes y contactos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{action('ClientsController@showNewClienteForm')}}">Nuevo Cliente</a></li>
            <li><a href="{{action('ContactsController@showNewContactoForm')}}">Nuevo Contacto</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{action('ClientsController@showClientesList')}}">Ver clientes</a></li>
            <li><a href="{{action('ContactsController@showContactosList')}}">Ver contactos</a></li>
          </ul>
        </li>
        @endpermission
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administración <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{action('RolesPermissionsController@showTable')}}">Roles y permisos</a></li>
            @permission('admin_users')
            <li role="separator" class="divider"></li>
            <li><a href="{{action('UsersController@showNewUserForm')}}">Nuevo usuario</a></li>
            <li><a href="{{action('UsersController@showUsersList')}}">Lista de usuarios</a>
            @endpermission            
            <!--li><a href="#">Something else here</a></li>
            <li><a href="#">Separated link</a></li-->
            </li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ayuda<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><del>Tutoriales</del></a></li>
          </ul>
        </li>

      </ul>
      <!--form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form-->
      <ul class="nav navbar-nav navbar-right">
        <!--li><a href="#">Link</a></li-->
        <li class="dropdown">
        @if(Auth::check())
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}<span class="caret"></span></a>
          @endif
          <ul class="dropdown-menu">
            <li><a href="{{action('UsersController@showCurrentUserInfo')}}">Detalles de la cuenta</a></li>
            <!--li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li-->
            <li><a href="{{action('Auth\LoginController@logout')}}">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
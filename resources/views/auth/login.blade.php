<!DOCTYPE html>
<html>
<head>
    <title>Login - Procesos TPM</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
    <div class="container col-lg-4 col-lg-push-4">
        <img class="" src="{{asset('images/logos/tpm.jpeg')}}">
        <div class="panel panel-default">
            <div class="panel-heading">Iniciar sesión</div>
            <div class="panel-body">
                <form method="post">
                @foreach ($errors->all() as $error)
<p class="alert alert-danger">{{ $error }}</p>
@endforeach 
                     {{csrf_field()}}
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input class="form-control" type="email" name="email" required placeholder="admin@localhost.com">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input class="form-control" type="password" name="password" placeholder="admin" required>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="success">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@include('layouts.widgets')
</body>
</html>
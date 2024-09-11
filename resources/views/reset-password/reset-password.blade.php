<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <title>GeniusSys</title>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        @include('layout/messages')
        <div class="card">
            <div class="card-body">
                <p class="login-box-msg">Recuperar contraseña</p>
                <form action="/reset-password" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email..." value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Nueva contraseña</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña...">
                    </div>
                    <button class="btn btn-primary btn-block">
                        Guardar
                    </button>
                    <a href="/login" class="btn btn-dark btn-block">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>

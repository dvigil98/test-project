<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <title>GeniusSys</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-light bg-white border-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-0">
            <a href="#" class="brand-link">
                <div class="bg-light font-weight-semibold d-flex align-items-center justify-content-center rounded-circle brand-image" style="height: 32px; width: 32px;">G</div>
                <span class="brand-text font-weight-light">GeniusSys</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">Navegación principal</li>
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link" id="dashboard">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/projects" class="nav-link" id="projects">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Proyectos</p>
                            </a>
                        </li>
                        @if(Auth::user()->role->name == 'Admin')
                        <li class="nav-item">
                            <a href="/admin/panel" class="nav-link" id="panel">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Panel para admin</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="/logout" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Salir</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            @include('layout/messages')
            @yield('main-content')
        </div>
        <footer class="main-footer border-0">
            <strong>Copyright &copy; 2024 <a href="#">GeniusSys.</a></strong> Todos los derechos reservados.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>
    </div>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    @stack('scripts')
</body>
</html>

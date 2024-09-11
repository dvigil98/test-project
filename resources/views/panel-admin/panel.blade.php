@extends('layout/layout')
@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-weight-bold">Panel</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Panel</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="text-muted mb-0">Numero de proyectos</p>
                        <p>{{ $nProjects }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="text-muted mb-0">Numero de tareas: <span class="badge badge-danger">Pendiente</span> </p>
                        <p>{{ $nPendingTasks }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="text-muted mb-0">Numero de tareas: <span class="badge badge-success">En progreso</span></p>
                        <p>{{ $nTasksInProcess }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="text-muted mb-0">Numero de tareas: <span class="badge badge-primary">Completada</span></p>
                        <p>{{ $nTasksDone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#panel').addClass('active');
    });
</script>
@endpush

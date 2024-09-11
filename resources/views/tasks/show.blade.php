@extends('layout/layout')
@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-weight-bold">Proyectos</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/projects">Lista de proyectos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalles del proyecto</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="text-muted mb-0">Id</p>
                                    <p>{{ $project->id }}</p>
                                </div>
                                <div class="form-group">
                                    <p class="text-muted mb-0">Nombre</p>
                                    <p>{{ $project->name }}</p>
                                </div>
                                <div class="form-group">
                                    <p class="text-muted mb-0">Descripcion</p>
                                    <p>{{ $project->description }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
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
        $('#projects').addClass('active');
    });
</script>
@endpush

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
                    <li class="breadcrumb-item active" aria-current="page">Editar proyecto</li>
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
                        <form action="/projects/{{ $project->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nombre:</label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre..." value="{{ old('name', $project->name) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Descripcion:</label>
                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Descripcion...">{{ old('description', $project->description) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                    <a href="/projects" class="btn btn-dark">Cancelar</a>
                                </div>
                            </div>
                        </form>
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

@extends('layout/layout')
@section('main-content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-weight-bold">Proyectos</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista de proyectos</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <a href="/projects/create" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar proyecto</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE</th>
                                        <th>DESCRIPCION</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $project)
                                    <tr>
                                        <td>{{ $project->id }}</td>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href="/projects/{{ $project->id }}/tasks" class="btn btn-light border" title="Agregar tareas"><i class="fas fa-plus-circle"></i></a>
                                                <a href="/projects/{{ $project->id }}" class="btn btn-light border" title="Ver"><i class="fas fa-info-circle"></i></a>
                                                <a href="/projects/{{ $project->id }}/edit" class="btn btn-light border" title="Editar"><i class="fas fa-marker"></i></a>
                                                <a href="#" class="btn btn-light border" title="Eliminar" data-toggle="modal" data-target="#exampleModal{{ $project->id }}"><i class="fas fa-trash"></i></a>
                                            </div>

                                            <!-- Modal para eliminar -->
                                            <form action="/projects/{{ $project->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal fade" id="exampleModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5 class="text-center text-danger">¿Desea eliminar este registro?</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-primary">Eliminar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

        $('.table').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json'
            }
        });
    });
</script>
@endpush

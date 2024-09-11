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
                    <li class="breadcrumb-item active" aria-current="page">Tareas del proyecto</li>
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
                    <div class="card-header border-0">
                        <h3 class="card-title">Proyecto</h3>
                    </div>
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

        <!-- Modal para agregar una nueva tarea -->
        <form action="/tasks" method="post">
            @csrf
            <div class="modal fade" id="exampleModalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre..." required>
                            </div>
                            <div class="form-group">
                                <label for="description">Descripcion</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Descripcion..." required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Fin modal agregar -->

        <!-- Modal para actuaizar una tarea -->
        <form action="/tasks/update" method="post">
            @csrf
            @method('PUT')
            <div class="modal fade" id="exampleModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                            <input type="hidden" name="id_edit" id="id_edit">
                            <div class="form-group">
                                <label for="name_edit">Nombre</label>
                                <input type="text" name="name_edit" id="name_edit" class="form-control" placeholder="Nombre..." required>
                            </div>
                            <div class="form-group">
                                <label for="description_edit">Descripcion</label>
                                <textarea name="description_edit" id="description_edit" class="form-control" placeholder="Descripcion..." required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="status_edit">Estado</label>
                                <select name="status_edit" id="status_edit" class="form-control" required>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="En progreso">En progreso</option>
                                    <option value="Completada">Completada</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Fin modal agregar -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0 d-flex align-items-center">
                        <h3 class="card-title">Lista de tareas</h3>
                        <a href="#" class="btn btn-light border ml-auto" data-toggle="modal" data-target="#exampleModalAgregar"><i class="fas fa-plus"></i> Agregar tarea</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE</th>
                                        <th>DESCRIPCION</th>
                                        <th>ESTADO</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ $task->id }}</td>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td>
                                            @if($task->status == 'Pendiente')
                                            <span class="badge badge-danger">{{ $task->status }}</span>
                                            @elseif($task->status == 'En progreso')
                                            <span class="badge badge-success">{{ $task->status }}</span>
                                            @else
                                            <span class="badge badge-primary">{{ $task->status }}</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href="/tasks/{{ $task->id }}/edit" class="btn btn-light border btnEditar" title="Editar" data-toggle="modal" data-target="#exampleModalEditar" data-id="{{ $task->id }}"><i class="fas fa-marker"></i></a>
                                                <a href="#" class="btn btn-light border" title="Eliminar" data-toggle="modal" data-target="#exampleModal{{ $task->id }}"><i class="fas fa-trash"></i></a>
                                            </div>

                                            <!-- Modal para eliminar -->
                                            <form action="/tasks/{{ $task->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal fade" id="exampleModal{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        $(document).on('click', '.btnEditar', function() {

            let id = $(this).attr('data-id');

            $.ajax({
                type: "GET",
                url: 'http://localhost:8000/tasks/' + id,
                success: function(r) {
                    console.log(r);
                    $('#id_edit').val(r.id);
                    $('#name_edit').val(r.name);
                    $('#description_edit').val(r.description);
                    $('#status_edit').val(r.status);
                },
                error: function(e) {
                    console.log(e);
                }
            });
        });

    });
</script>
@endpush

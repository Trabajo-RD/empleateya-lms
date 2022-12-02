@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <a href="{{ route( 'admin.types.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Nuevo tipo</a>
    <h1 class="text-dark">Tipos de curso</h1>
@stop

@section('content')

    {{-- @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif --}}

    <div class="card">
        <div class="card-header">
            Listado de tipos de curso
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $types as $type )
                        <tr>
                            <td width="10px">{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>
                            <td width="12%">
                                <a href="{{ route('admin.types.edit', $type ) }}" class="btn btn-outline-secondary"><i class="far fa-edit mr-1"></i>Editar</a>
                            </td>
                            <td width="14%">
                                <form action="{{ route( 'admin.types.destroy', $type ) }}" method="POST" class="delete-type">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger" type="submit"><i class="far fa-trash-alt mr-1"></i>Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-sm text-muted">
            Los <strong>tipos</strong> se utilizan para diferenciar entre un curso tipo itinerario de aprendizaje, módulo o video.
        </div>
    </div>
@stop

@section('js')

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Se ha eliminado el tipo de curso solicitado.',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-type').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar este tipo de curso?',
            text: "La operación no podrá ser revertida y los cursos que hayan sido asignados a este tipo de curso serán mostrados 'Sin tipo definido'!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.value) {

                // Submit the form
                this.submit();

            }
            })
        });
    </script>
@stop


@extends('adminlte::page')

@section('title', 'Empleateya LMS')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <a href="{{ route('admin.modalities.create' ) }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Nueva modalidad</a>
    <h1 class="text-dark">Modalidades</h1>
@stop

@section('content')

    {{-- @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif --}}

    <div class="card">
        <div class="card-header">
            Listado de modalidades
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
                    @foreach( $modalities as $modality )
                        <tr>
                            <td width="10px">{{ $modality->id }}</td>
                            <td>{{ $modality->name }}</td>
                            <td width="12%">
                                <a href="{{ route('admin.modalities.edit', $modality ) }}" class="btn btn-outline-secondary"><i class="far fa-edit mr-1"></i>Editar</a>
                            </td>
                            <td width="14%">
                                <form action="{{ route( 'admin.modalities.destroy', $modality ) }}" method="POST" class="delete-modality">
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
            Las <strong>modalidades</strong> hacen referencia a la modalidad de enseñanza con la cuál se impartirán los cursos.
        </div>
    </div>
@stop

@section('js')

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminada!',
                'Se ha eliminado la modalidad solicitada.',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-modality').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar esta modalidad de aprendizaje?',
            text: "La operación no podrá ser revertida y los cursos que hayan sido asignados a esta modalidad de aprendizaje serán mostrados 'Sin modalidad definida'!",
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

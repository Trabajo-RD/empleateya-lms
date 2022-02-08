@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <a href="{{ route('admin.platforms.create', app()->getLocale() ) }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Nueva plataforma</a>
    <h1 class="text-primary">Plataformas</h1>
@stop

@section('content')

    {{-- @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif --}}

    <div class="card">
        <div class="card-header">
            Listado de plataformas
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
                    @foreach( $platforms as $platform )
                        <tr>
                            <td width="10px">{{ $platform->id }}</td>
                            <td>{{ $platform->name }}</td>
                            <td width="12%">
                                <a href="{{ route('admin.platforms.edit', [app()->getLocale(), $platform] ) }}" class="btn btn-outline-secondary"><i class="far fa-edit mr-1"></i>Editar</a>
                            </td>
                            <td width="14%">
                                <form action="{{ route( 'admin.platforms.destroy', [app()->getLocale(), $platform] ) }}" method="POST" class="delete-platform">
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
            Las <strong>plataformas</strong> nos sirven para asociar a una lección, un video compartido desde una URL externa. Además, se utiliza para incrustar dicho video dentro del sistema.
        </div>
    </div>
@stop

@section('js')

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminada!',
                'Se ha eliminado la plataforma.',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-platform').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar esta plataforma?',
            text: "La operación no podrá ser revertida y los cursos que hayan sido asignados a esta plataforma serán mostrados 'Sin plataforma definida'!",
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

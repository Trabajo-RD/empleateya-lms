@extends('adminlte::page')

@section('title', 'Capacítate RD - Instructor Workshops')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <a href="{{ route('instructor.dashboard.workshops.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Añadir Nuevo</a>
    <h1 class="text-dark">Talleres</h1>
@stop

@section('content')

    @if( session('workshop_created'))
        <div class="alert alert-success" role="alert">
            <strong>¡En hora buena!</strong> {{session('workshop_created')}}
        </div>
    @endif

    {{-- @if( session('rol_destroyed'))
        <div class="alert alert-danger" role="alert">
            <strong>¡Registro eliminado!</strong> {{session('rol_destroyed')}}
        </div>
    @endif --}}

    <div class="card">

        <div class="card-body shadow-sm">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $workshops as $workshop )
                        @if(  $workshop )
                        <tr>
                            <td width="10px">{{ $workshop->id }}</td>
                            <td>{{ $workshop->title }}</td>
                            <td width="10px">
                                <a class="btn btn-outline-secondary" href="{{ route('instructor.dashboard.workshops.edit', $workshop ) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('instructor.dashboard.workshops.destroy', $workshop ) }}" method="POST" class="delete-workshop">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-outline-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="4" class="text-gray">
                                <div class="info-box bg-gradient-warning">
                                <span class="info-box-icon"><i class="fas fa-info-circle"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Por el momento no posees talleres añadidos, haz click en <b>Añadir Nuevo</b> para crear un taller.</span>
                                </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    {{-- Create confirmed --}}
    @if (session('create') == 'success')
    <script>
        Swal.fire(
            'Creado!',
            'Has creado satisfactoriamente un nuevo taller.',
            'success'
            );
    </script>
    @endif

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'El taller ha sido eliminado',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-workshop').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar este taller?',
            text: "La operación no podrá ser revertida y los usuarios que se hayan enrolado en este taller no podrán matricularse!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#EE2A24',
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

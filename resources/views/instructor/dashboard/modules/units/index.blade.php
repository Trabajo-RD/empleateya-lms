@extends('adminlte::page')

@section('title', 'Capacítate RD - Units')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <a href="{{ route('instructor.dashboard.modules.units.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Añadir Unidad</a>
    <h1 class="text-dark">{{ Lang::get('Units') }}</h1>
@stop

@section('content')

    @if( session('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            {{ session('success') }}
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
                    @forelse ( $units as $unit )
                        @if(  $unit )
                        <tr>
                            <td width="10px">{{ $unit->id }}</td>
                            <td>{{ $unit->title }}</td>
                            <td width="10px">
                                <a class="btn btn-outline-secondary" href="{{ route('instructor.dashboard.modules.units.edit', $unit ) }}">{{ Lang::get('Edit') }}</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('instructor.dashboard.modules.units.destroy', $unit ) }}" method="POST" class="delete-path">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-outline-danger" type="submit">{{ Lang::get('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="4" class="text-gray">
                                <div class="info-box bg-gradient-info">
                                <span class="info-box-icon"><i class="fas fa-info-circle"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Por el momento no tienes unidades añadidas, haz click en <b>Añadir Unidad</b> para crear una.</span>
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
            'Creada!',
            'La unidad se ha creado satisfactoriamente.',
            'success'
            );
    </script>
    @endif

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminada!',
                'Se ha eliminado la unidad',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-unit').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar esta unidad?',
            text: "La operación no podrá ser revertida y se eliminará de los módulos donde esté incluida.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#003876',
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

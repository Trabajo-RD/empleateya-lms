@extends('adminlte::page')

@section('title', 'Capacítate RD - Instructor Paths')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <a href="{{ route('instructor.dashboard.paths.create') }}" class="btn btn-accent float-right"><i class="fas fa-plus mr-1"></i>{{ Lang::get('Add Path') }}</a>
    <h1 class="color-primary">{{ Lang::get('Learning Paths') }}</h1>
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
            <table class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th>{{ Lang::get('Title') }}</th>
                        <th>{{ Lang::get('Status') }}</th>
                        <th style="white-space: nowrap">{{ Lang::get('Last Update') }}</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $paths as $path )
                        @if(  $path )
                        <tr>
                            <td>
                                <span class="font-weight-normal color-primary">{{ $path->title }}</span><br>
                                <div class="d-flex align-items-center gap-2">
                                    @if ( $path->modules_count > 0)
                                        <small class="text-muted">
                                            <i class="fas fa-chalkboard mr-2"></i>{{ $path->modules_count }} {{ Str::plural( __('Modules'), $path->modules_count) }}
                                        </small>
                                    @endif
                                </div>
                            </td>
                            <td>
                                @php
                                    switch ($path->status) {
                                        case '1':
                                            echo '<span class="badge bg-secondary">' . Lang::get('Draft') . '</span>';
                                            break;
                                        case '2':
                                            echo '<span class="badge bg-warning text-dark">' . Lang::get('Pending') . '</span>';
                                            break;
                                        case '3':
                                            echo '<span class="badge bg-success">' . Lang::get('Published') . '</span>';
                                            break;
                                        case '4':
                                            echo '<span class="badge bg-danger">' . Lang::get('Removed') . '</span>';
                                            break;

                                        default:
                                            echo '<span class="badge bg-secondary">' . Lang::get('Draft') . '</span>';
                                            break;
                                    }
                                @endphp
                            </td>
                            <td>{{ $path->updated_at }}</td>
                            <td width="10px">
                                <a class="btn btn-sm btn-outline-info d-flex align-items-center flex-nowrap" href="{{ route('instructor.dashboard.paths.modules.index', $path ) }}">
                                    <i class="fas fa-chalkboard mr-2"></i>
                                    {{ Lang::get('Modules') }}
                                </a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-sm btn-outline-secondary d-flex align-items-center flex-nowrap" href="{{ route('instructor.dashboard.paths.edit', $path ) }}">
                                    <i class="fas fa-edit mr-2"></i>
                                    {{ Lang::get('Edit') }}
                                </a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('instructor.dashboard.paths.destroy', $path ) }}" method="POST" class="delete-path">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-sm btn-outline-danger d-flex align-items-center flex-nowrap" type="submit">
                                        <i class="fas fa-trash mr-2"></i>
                                        {{ Lang::get('Delete') }}
                                    </button>
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
                                    <span class="info-box-text">Por el momento no posees rutas de aprendizaje, haz click en <b>Añadir Nueva</b> para crear una ruta.</span>
                                </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <x-bootstrap.pagination.links :model="$paths"></x-bootstrap.pagination.links>

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
            'Has creado satisfactoriamente una nueva ruta.',
            'success'
            );
    </script>
    @endif

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminada!',
                'La ruta ha sido eliminado',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-path').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar esta ruta de aprendizaje?',
            text: "La operación no podrá ser revertida y los usuarios que se hayan enroladoen esta ruta no podrán matricularse!",
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

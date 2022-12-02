@extends('adminlte::page')

@section('title', 'Capacítate RD - Instructor Courses')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <a href="{{ route('instructor.dashboard.courses.create') }}" class="btn btn-accent float-right">
        {{ Lang::get('Add Course') }}
        <i class="fas fa-plus ml-1"></i>
    </a>
    <h1 class="color-primary">{{ Lang::get('Courses') }}</h1>
@stop

@section('content')

    @if( session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            {{ session('success') }}
        </div>
    @endif

    @if( session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            {{ session('info') }}
        </div>
    @endif

    {{-- @if( session('rol_destroyed'))
        <div class="alert alert-danger" role="alert">
            <strong>¡Registro eliminado!</strong> {{session('rol_destroyed')}}
        </div>
    @endif --}}

    <div class="card">

        <div class="card-body">
            <table class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th>{{ Lang::get('Title') }}</th>
                        <th>{{ Lang::get('Status') }}</th>
                        <th class="d-flex flex-nowrap">{{ Lang::get('Last Update') }}</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $courses as $course )
                        @if (  $course )
                        <tr>
                            <td>
                                <span class="font-weight-normal color-primary">{{ $course->title }}</span><br>
                                <div class="d-flex align-items-center gap-2">
                                    @if ( $course->sections_count > 0)
                                        <small class="text-muted">
                                            <i class="fas fa-chalkboard mr-2"></i>{{ $course->sections_count }} {{ Str::plural( __('Sections'), $course->sections_count) }}
                                        </small>
                                    @endif
                                    @if ( $course->image_count > 0)
                                        <small class="text-muted">
                                            <i class="fas fa-image mr-2"></i>
                                            {{ Str::plural( __('Images'), $course->image_count) }}:
                                            {{ $course->image_count }} 
                                        </small>
                                    @endif
                                </div>
                            </td>
                            <td>
                                @php
                                    switch ($course->status) {
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
                            <td>{{ $course->updated_at }}</td>
                            <td width="10px">
                                <a class="btn btn-sm btn-outline-info d-flex align-items-center flex-nowrap" href="{{ route('instructor.dashboard.courses.sections.index', $course ) }}">
                                    {{ Lang::get('Sections') }}
                                    <i class="fas fa-chalkboard ml-2"></i>
                                </a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-sm btn-outline-secondary d-flex align-items-center flex-nowrap text-uppercase" href="{{ route('instructor.dashboard.courses.show', $course ) }}">
                                    {{ Lang::get('View') }}
                                    <i class="fas fa-external-link-alt ml-2"></i>
                                    {{-- <i class="fas fa-edit ml-2"></i> --}}
                                </a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-sm btn-outline-secondary d-flex align-items-center flex-nowrap text-uppercase" href="{{ route('instructor.dashboard.courses.edit', $course ) }}">
                                    {{ Lang::get('Edit') }}
                                    <i class="fas fa-edit ml-2"></i>
                                </a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('instructor.dashboard.courses.destroy', $course ) }}" method="POST" class="delete-course">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-sm btn-outline-danger d-flex align-items-center flex-nowrap text-uppercase" type="submit">
                                        {{ Lang::get('Delete') }}
                                        <i class="fas fa-trash ml-2"></i>
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
                                    <span class="info-box-text">Por el momento no posees cursos añadidos, haz click en <b>Añadir Nuevo</b> para crear un curso.</span>
                                </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <x-bootstrap.pagination.links :model="$courses"></x-bootstrap.pagination.links>

        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

    {{-- Create confirmed --}}
    @if (session('create') == 'success')
    <script>
        Swal.fire(
            'Creado!',
            'Has creado satisfactoriamente un nuevo curso.',
            'success'
            );
    </script>
    @endif

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'El curso ha sido eliminado',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-course').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar este curso?',
            text: "La operación no podrá ser revertida y los usuarios que se hayan enrolado a este curso no podrán matricularse!",
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

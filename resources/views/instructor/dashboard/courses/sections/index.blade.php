@extends('adminlte::page')

@section('title', 'Capacítate RD - Course Sections')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <small class="text-muted text-uppercase">{{ Lang::get('Course') }}</small><br>
    <h1 class="color-primary">{{ $course->title }}</h1>
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

    @if( session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            {{ session('error') }}
        </div>
    @endif

    {{-- @if( session('rol_destroyed'))
        <div class="alert alert-danger" role="alert">
            <strong>¡Registro eliminado!</strong> {{session('rol_destroyed')}}
        </div>
    @endif --}}

    <div class="d-flex align-items-center justify-content-between mb-3 text-muted">
        <a href="{{ route('instructor.dashboard.courses.index') }}" class="mr-auto">
            <i class="fas fa-arrow-left mr-2"></i>{{ Lang::get('Go back') }}
        </a>
    </div>

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mr-auto">{{ Lang::get('Sections') }}</h3>

            <a href="{{ route('instructor.dashboard.courses.sections.create', $course) }}" class="btn btn-accent ml-2">
                {{ Lang::get('Add Section') }}
                <i class="fas fa-plus ml-2"></i>
            </a>

            <!-- Button trigger modal -->
            {{-- <button type="button" class="btn btn-accent ml-2" data-toggle="modal" data-target="#add-section-modal">
                {{ Lang::get('Add Section') }}
                <i class="fas fa-plus ml-2"></i>
            </button> --}}


        </div>


            @if(count($sections))
                <div class="card-body shadow-sm">

                    @error('sections')
                        <small class="text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror

                    <div class="card shadow mt-3">
                        <div class="card-body">
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>{{ Lang::get('Name') }}</th>
                                        <th colspan="4"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sections as $section)
                                        <tr>
                                            <td>
                                                <span class="font-weight-normal color-primary">{{ $section->title }}</span><br>
                                                <div class="d-flex align-items-center justify-content-start gap-2">
                                                    @if($section->lessons_count > 0)
                                                        <small class="text-muted">
                                                            <i class="fas fa-chalkboard mr-2"></i>{{ $section->lessons_count }} {{ Str::plural( __('Lessons'), $section->lessons_count) }}
                                                        </small>
                                                    @endif
                                                    @if($section->scorms_count > 0)
                                                        <small class="text-muted">
                                                            <i class="fas fa-chalkboard mr-2"></i>{{ $section->scorms_count }} {{ Str::plural( __('SCORM'), $section->scorms_count) }}
                                                        </small>
                                                    @endif
                                                </div>
                                            </td>
                                            <td width="10px">
                                                <a class="btn btn-sm btn-outline-info d-flex align-items-center flex-nowrap" href="{{ route('instructor.dashboard.courses.sections.lessons.index', ['section' => $section] ) }}">
                                                    {{ Lang::get('Lessons') }}
                                                    <i class="fas fa-chalkboard ml-2"></i>
                                                </a>
                                            </td>
                                            <td width="10px">
                                                <a class="btn btn-sm btn-outline-warning d-flex align-items-center flex-nowrap" href="{{ route('instructor.dashboard.courses.sections.scorm.index', $section ) }}">
                                                    {{ Lang::get('SCORM') }}
                                                    <i class="fas fa-file-archive ml-2"></i>
                                                </a>
                                            </td>
                                            <td width="10px">
                                                <a class="btn btn-sm btn-outline-secondary d-flex align-items-center flex-nowrap" href="{{ route('instructor.dashboard.courses.sections.edit', $section ) }}">
                                                    {{ Lang::get('Edit') }}
                                                    <i class="fas fa-edit ml-2"></i>
                                                </a>
                                                <!-- Button trigger modal -->
                                                {{-- <button type="button" class="btn btn-sm btn-outline-secondary d-flex align-items-center flex-nowrap" data-toggle="modal" data-target="#edit-section-modal">
                                                    {{ Lang::get('Edit') }}
                                                    <i class="fas fa-edit ml-2"></i>
                                                </button> --}}
                                            </td>
                                            <td width="10px">
                                                <form action="{{ route('instructor.dashboard.courses.sections.destroy', $section ) }}" method="POST" class="delete-section">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-sm btn-outline-danger d-flex align-items-center flex-nowrap" type="submit">
                                                        {{ Lang::get('Delete') }}
                                                        <i class="fas fa-trash ml-2"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <x-bootstrap.pagination.links :model="$sections"></x-bootstrap.pagination.links>
                        </div>
                    </div>

                </div><!--card-body-->
            @endif

    </div>

    <!-- Modal -->
    {{-- @include('instructor.dashboard.courses.sections.create') --}}
    {{-- @include('instructor.dashboard.courses.sections.edit') --}}
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
            'La sección se ha creado satisfactoriamente.',
            'success'
            );
    </script>
    @endif

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Se ha eliminado la sección',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-section').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar esta sección?',
            text: "La operación no podrá ser revertida y los usuarios que se hayan enrolado a este curso no podrán ver esta sección",
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

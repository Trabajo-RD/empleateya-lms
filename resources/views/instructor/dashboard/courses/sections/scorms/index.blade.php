@extends('adminlte::page')

@section('title', 'Capacítate RD - Section Scorms')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <small class="text-muted text-uppercase">{{ Lang::get('Section') }}</small><br>
    <h1 class="color-primary">{{ $section->title }}</h1>
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

    {{-- .row --}}

    <div class="d-flex align-items-center justify-content-between mb-3 text-muted">
        <a href="{{ route('instructor.dashboard.courses.sections.index', $section->course) }}" class="mr-auto">
            <i class="fas fa-arrow-left mr-2"></i>{{ Lang::get('Go back') }}
        </a>
    </div>

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
            <div class="col-md-3 mr-auto">
                <h3>{{ Lang::get('SCORM Packages') }}</h3>
            </div>

            <div class="d-flex align-items-center justify-content-end col-md-5 text-left">
                <span class="text-sm">{{ Lang::get('Upload a compressed file in ZIP format') }}</span>
                <div class="col-4 input-group input-group-sm">
                    {!! Form::select('scorm_format', $scorm_formats, null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <a id="scorm-1-2-import" href="{{ route('instructor.dashboard.courses.sections.scorm.create', $section) }}" class="btn btn-accent">
                {{ Lang::get('Import') }}
                <i class="fas fa-file-import mr-2"></i>
            </a>



            <!-- Button trigger modal -->
            {{-- <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#add-scorm-modal">
                <i class="fas fa-plus mr-2"></i>{{ Lang::get('Add Package') }}
            </button> --}}

        </div>


        @if(count($scorms))
            <div class="card-body shadow-sm">

                @error('scorms')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror

                <div class="card shadow mt-3">
                    <div class="card-body">
                        <table class="table table-responsive-sm table-hover" >
                            <thead>
                                <tr>
                                    <th>{{ Lang::get('Title') }}</th>
                                    <th>{{ Lang::get('URL') }}</th>
                                    <th>{{ Lang::get('Version') }}</th>
                                    <th>{{ Lang::get('Last Update') }}</th>
                                    <th colspan="3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($scorms as $scorm)
                                    <tr>
                                        <td>
                                            <span class="font-weight-normal color-primary">{{ $scorm->title }}</span><br>
                                        </td>
                                        {{-- <td>
                                            <label>
                                                {!! Form::checkbox('scorms[]', $scorm->id, null, ['class' => 'mr-1']) !!}
                                                {{ $scorm->title }}
                                            </label>
                                        </td> --}}
                                        <td>
                                            {{ $scorm->entry_url }}
                                        </td>
                                        <td>
                                            {{ $scorm->version }}
                                        </td>
                                        <td>
                                            {{ $scorm->updated_at }}
                                        </td>
                                        <td width="10px">
                                            <a class="btn btn-sm btn-outline-info d-flex align-items-center flex-nowrap" href="{{ route('instructor.dashboard.courses.sections.scorm.show', $scorm ) }}">
                                                {{ Lang::get('View') }}
                                                <i class="far fa-eye ml-2"></i>
                                            </a>
                                        </td>
                                        <td width="10px">
                                            <a class="btn btn-sm btn-outline-secondary d-flex align-items-center flex-nowrap" href="{{ route('instructor.dashboard.courses.sections.scorm.edit', $scorm ) }}">
                                                {{ Lang::get('Edit') }}
                                                <i class="fas fa-edit ml-2"></i>
                                            </a>
                                        </td>
                                        <td width="10px">
                                            <form action="{{ route('instructor.dashboard.courses.sections.scorm.destroy', $scorm ) }}" method="POST" class="delete-scorm">
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
                    </div>
                </div>

            </div><!--card-body-->
        @endif

    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

    {{-- $(document).ready(function() {
        $("#add-lesson-modal").modal();
    }); --}}

    {{-- Create confirmed --}}
    @if (session('create') == 'success')
    <script>
        Swal.fire(
            'Creado!',
            'Se ha añadido el recurso satisfactoriamente.',
            'success'
            );
    </script>
    @endif

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Se ha eliminado el recurso',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-scorm').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar este recurso?',
            text: "La operación no podrá ser revertida y los usuarios que se hayan enrolado a este curso no podrán llevar el avance del mismo!",
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

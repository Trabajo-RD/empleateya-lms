@extends('adminlte::page')

@section('title', 'Capacítate RD - Lesson Content')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1 class="text-dark">{{ $lesson->title }}</h1>
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

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mr-auto">{{ Lang::get('Content') }}</h3>

            {{-- <a href="{{ route('instructor.dashboard.courses.sections.create', $course) }}" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>{{ Lang::get('Add Section') }}</a> --}}

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#add-content-modal">
                <i class="fas fa-plus mr-2"></i>{{ Lang::get('Add Content') }}
            </button>

        </div>


        {{-- @if(count($lessons))
            <div class="card-body shadow-sm">

                @error('lessons')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror

                <div class="card shadow mt-3">
                    <div class="card-body">
                        <table class="table">
                            <thead class="bg-secondary">
                                <tr>
                                    <th>{{ Lang::get('Name') }}</th>
                                    <th colspan="3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lessons as $lesson)
                                    <tr>
                                        <td>
                                            <label>
                                                {!! Form::checkbox('lessons[]', $lesson->id, null, ['class' => 'mr-1']) !!}
                                                {{ $lesson->title }}
                                            </label>
                                        </td>
                                        <td width="10px">
                                            <a class="btn btn-outline-secondary" href="{{ route('instructor.dashboard.courses.sections.lessons.edit', $lesson ) }}">{{ Lang::get('Edit') }}</a>
                                        </td>
                                        <td width="10px">
                                            <a class="btn btn-outline-info" href="{{ route('instructor.dashboard.courses.sections.lessons.content.index', $lesson ) }}">{{ Lang::get('Content') }}</a>
                                        </td>
                                        <td width="10px">
                                            <form action="{{ route('instructor.dashboard.courses.sections.lessons.destroy', $lesson ) }}" method="POST" class="delete-section">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-outline-danger" type="submit">{{ Lang::get('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div><!--card-body-->
        @endif --}}

    </div>
@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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

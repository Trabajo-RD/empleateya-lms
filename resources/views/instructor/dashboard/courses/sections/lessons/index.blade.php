@extends('adminlte::page')

@section('title', 'Capacítate RD - Section Lessons')

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

    <div class="d-flex align-items-center justify-content-between mb-3 text-muted">
        <a href="{{ route('instructor.dashboard.courses.sections.index', $section->course) }}" class="mr-auto">
            <i class="fas fa-arrow-left mr-2"></i>{{ Lang::get('Go back') }}
        </a>
    </div>

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h3 class="mr-auto">{{ Lang::get('Lessons') }}</h3>

            <a href="{{ route('instructor.dashboard.courses.sections.lessons.create', $section) }}" class="btn btn-accent ml-2">
                {{ Lang::get('Add Section') }}
                <i class="fas fa-plus ml-2"></i>
            </a>

            <!-- Button trigger modal -->
            {{-- <button type="button" class="btn btn-accent ml-2" data-toggle="modal" data-target="#add-lesson-modal">
                <i class="fas fa-plus mr-2"></i>{{ Lang::get('Add Lesson') }}
            </button> --}}


        </div>


            @if(count($lessons))
                <div class="card-body shadow-sm">

                    @error('lessons')
                        <small class="text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror

                    <div class="card shadow mt-3">
                        <div class="card-body">
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>{{ Lang::get('Title') }}</th>
                                        <th colspan="3"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lessons as $lesson)
                                        <tr>
                                            <td>
                                                <span class="font-weight-normal color-primary">{{ $lesson->title }}</span><br>
                                                <div class="d-flex align-items-center justify-content-start gap-2">
                                                    @if($lesson->resource_count > 0)
                                                        <small class="text-muted">
                                                            <i class="fas fa-chalkboard mr-2"></i>{{ $lesson->resource_count }} {{ Str::plural( __('Resources'), $lesson->resource_count) }}
                                                        </small>
                                                    @endif
                                                </div>
                                            </td>
                                            <td width="10px">
                                                <a class="btn btn-sm btn-outline-info d-flex align-items-center flex-nowrap" href="{{ route('instructor.dashboard.courses.sections.lessons.content.index', $lesson ) }}">
                                                    {{ Lang::get('Content') }}
                                                    <i class="fas fa-chalkboard ml-2"></i>
                                                </a>
                                            </td>
                                            <td width="10px">
                                                <a class="btn btn-sm btn-outline-secondary d-flex align-items-center flex-nowrap" href="{{ route('instructor.dashboard.courses.sections.lessons.edit', $lesson ) }}">
                                                    {{ Lang::get('Edit') }}
                                                    <i class="fas fa-edit ml-2"></i>
                                                </a>
                                            </td>
                                            <td width="10px">
                                                <form action="{{ route('instructor.dashboard.courses.sections.lessons.destroy', $lesson ) }}" method="POST" class="delete-lesson">
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

                            <x-bootstrap.pagination.links :model="$lessons"></x-bootstrap.pagination.links>
                        </div>
                    </div>

                </div><!--card-body-->
            @endif

    </div>
@stop

{{-- <x-bootstrap.modal.form size="lg" id="add-lesson-modal" route="instructor.dashboard.courses.sections.lessons.store" :params="$section">
    <x-slot name="modal_header">
        <h4 class="modal-title text-primary" id="modalLabel">{{ Lang::get('New Lesson') }}</h4>
    </x-slot>
    <x-slot name="modal_body">
        @include('instructor.dashboard.courses.sections.lessons.partials.form')
    </x-slot>
    <x-slot name="modal_footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ Lang::get('Close') }}</button>
        {!! Form::submit( Lang::get('Add Lesson'), ['class' => 'btn btn-primary shadow']) !!}
    </x-slot>
</x-bootstrap.modal.form> --}}


@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')



    {{-- Create confirmed --}}
    @if (session('create') == 'success')
    <script>
        Swal.fire(
            'Creado!',
            'La lección se ha creado satisfactoriamente.',
            'success'
            );
    </script>
    @endif

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Se ha eliminado la lección',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-lesson').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar esta lección?',
            text: "La operación no podrá ser revertida y los usuarios que se hayan enrolado a este curso no podrán ver esta lección",
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

@extends('adminlte::page')

@section('title', 'Capacítate RD - Edit SCORM')

@section('plugins.Sweetalert2', true)

@section('content_header')
    {{-- <a href="{{ route('instructor.dashboard.courses.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Añadir Nuevo</a> --}}
    <h1 class="color-primary">{{ Lang::get('Edit SCORM package') }}</h1>
@stop

@section('content')

    <!-- alerts -->
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

    {{-- TODO: Using with Livewire --}}

    {{-- @livewire('instructor.courses.sections.scorms.section-scorms', ['section' => $section], key($section->id)) --}}

    {{-- TODO: Using with Laravel --}}

    <div class="card mb-5">
        {!! Form::model($scorm, ['method' => 'PUT', 'route' => ['instructor.dashboard.courses.sections.scorm.update', $scorm], 'files' => 'true','enctype'=>'multipart/form-data']) !!}
        <div class="card-body shadow-sm">

            <!-- alert -->
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                {{ Lang::get('Capacítate does not generate SCORM content. Capacítate presents the content in SCORM packages to learners, and saves data from learner interactions with the SCORM package') }}
            </div>

            {!! Form::hidden('user_id', auth()->user()->id) !!}

            @include('instructor.dashboard.courses.sections.scorms.partials.form')

        </div><!-- card-body -->

        <div class="card-footer bg-white mb-4 d-flex justify-content-end">
            <a href="{{ route('instructor.dashboard.courses.sections.scorm.index', $scorm->scormable) }}" class="btn btn-default mr-auto"><i class="fas fa-arrow-left mr-2"></i>{{ Lang::get('Return') }}</a>
            {!! Form::button( Lang::get('Update Resource') . '<i class="fas fa-sync ml-2"></i>', ['type' => 'submit', 'class' => 'btn btn-accent shadow']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script>

        $(document).ready(function() {
            let file = document.getElementById('origin_file').files[0]

        console.log(file);

        // Upload a file:
        @this.upload('origin_file', file, (uploadedFilename) => {
            // Success callback.
        }, () => {
            // Error callback.
        }, (event) => {
            // Progress callback.
            // event.detail.progress contains a number between 1 and 100 as the upload progresses.
        })

        // Upload multiple files:
        // @this.uploadMultiple('photos', [file], successCallback, errorCallback, progressCallback)

        // Remove single file from multiple uploaded files
        // @this.removeUpload('photos', uploadedFilename, successCallback)
        });

    </script> --}}
@stop

@extends('adminlte::page')

@section('title', 'Capacítate RD - Create Lesson')

@section('plugins.Sweetalert2', true)

@section('content_header')
    {{-- <a href="{{ route('instructor.dashboard.courses.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Añadir Nuevo</a> --}}
    <h1 class="color-primary">{{ Lang::get('Add Lesson') }}</h1>
@stop

@section('content')

    <div class="card mb-5">
        {!! Form::open(['route' => 'instructor.dashboard.courses.sections.lessons.store']) !!}
        <div class="card-body shadow-sm">

            {!! Form::hidden('user_id', auth()->user()->id) !!}
            {!! Form::hidden('section_id', $section->id) !!}

            @include('instructor.dashboard.courses.sections.lessons.partials.form')

        </div><!--card-body-->

        <div class="card-footer bg-white mb-4 d-flex justify-content-between">
            <a href="{{ route('instructor.dashboard.courses.sections.lessons.index', $section) }}" class="btn btn-default mr-auto"><i class="fas fa-arrow-left mr-2"></i>{{ Lang::get('Return') }}</a>
            {!! Form::button( Lang::get('Save and Close') . '<i class="fas fa-save ml-2"></i>', ['type' => 'submit', 'class' => 'btn btn-accent shadow']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
    <!-- CK Editor WYSIWYG-->
    <script src="{{ asset('js/instructor/courses/custom-ckeditor.js') }}"></script>
    <!-- form js -->
    <script src="{{ asset('js/instructor/courses/form.js') }}"></script>
@stop

{{-- @include('instructor.dashboard.courses.sections.partials.edit-modal') --}}

@extends('adminlte::page')

@section('title', 'Capacítate RD - Edit Section')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1 class="color-primary">{{ Lang::get('Edit Section') }}</h1>
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
    <!-- /alerts -->

    <div class="card mb-5">
        {!! Form::model($section, ['method' => 'PUT', 'route' => ['instructor.dashboard.courses.sections.update', $section]]) !!}
        <div class="card-body shadow-sm">

            {!! Form::hidden('user_id', auth()->user()->id) !!}

            @include('instructor.dashboard.courses.sections.partials.form')

        </div><!--card-body-->

        <div class="card-footer bg-white mb-4 d-flex justify-content-between">
            <a href="{{ route('instructor.dashboard.courses.sections.index', $section->course) }}" class="btn btn-default mr-auto"><i class="fas fa-arrow-left mr-2"></i>{{ Lang::get('Return') }}</a>
            {!! Form::button(Lang::get('Update and Close') . '<i class="fas fa-save ml-2"></i>' , ['type' => 'submit', 'class' => 'btn btn-accent shadow']) !!}
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

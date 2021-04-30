@extends('adminlte::page')

@section('title', 'Empleateya LMS')

@section('content_header')
    <a href="{{ route('admin.slides.create' ) }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Nuevo slide</a>
    <h1 class="text-primary"><i class="far fa-edit mr-1"></i>Editar slide</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($slide, ['route' => ['admin.slides.update', $slide ], 'method' => 'put' ]) !!}


            @include('admin.slides.partials.form')

                {!! Form::submit('Actualizar slide', ['class' => 'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

<script src="{{ asset('js/admin/slides/form.js') }}"></script>
@stop

@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('content_header')
    {{-- <a href="{{ route('admin.slides.create' ) }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Nuevo slide</a> --}}
    <h1 class="text-primary">Editar slide</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($slide, ['route' => ['admin.slides.update', [app()->getLocale(), $slide] ], 'method' => 'put' ]) !!}

                @include('admin.slides.partials.form')

                <a href="{{ url()->previous() }}" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Omitir y volver a la vista anterior"><i class="fas fa-arrow-circle-left mr-2"></i>Volver atrás</a>

                {!! Form::submit('Actualizar slide', ['class' => 'btn btn-primary float-right', 'data-toggle' => 'tooltip', 'data-placement' => 'left', 'title' => 'Guardar los cambios realizados']) !!}
                
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

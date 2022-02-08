@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('content_header')
    <h1 class="text-primary"><i class="far fa-edit mr-1"></i>Editar categoría</h1>
@stop

@section('content')

<div class="row">
    <div class="col col-md-12">

    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($category, ['route' => ['admin.categories.update', [app()->getLocale(), $category ]], 'method' => 'put' ]) !!}

                @include('admin.categories.partials.form')

                <a href="{{ url()->previous() }}" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Omitir los cambios y volver a la vista anterior"><i class="fas fa-arrow-circle-left mr-2"></i>Volver atrás</a>

                {!! Form::submit(trans('Guardar cambios'), ['class' => 'btn btn-primary float-right', 'data-toggle' => 'tooltip', 'data-placement' => 'left', 'title' => 'Guardar los cambios realizados en esta categoría']) !!}

            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script src="{{ asset('js/admin/categories/form.js') }}"></script>
@stop

@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('content_header')
    <h1 class="text-primary">Editar modalidad</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($modality, ['route' => ['admin.modalities.update', [app()->getLocale(), $modality] ], 'method' => 'put' ]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la modalidad']) !!}
                </div>

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group">
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}
                </div>

                <a href="{{ url()->previous() }}" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Omitir y volver a la vista anterior"><i class="fas fa-arrow-circle-left mr-2"></i>Volver atrás</a>

                {!! Form::submit('Actualizar modalidad', ['class' => 'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop

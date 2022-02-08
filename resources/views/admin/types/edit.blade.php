@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('content_header')
    <h1 class="text-primary"><i class="far fa-edit mr-1"></i>Editar tipo</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($type, ['route' => ['admin.types.update', [app()->getLocale(), $type] ], 'method' => 'put' ]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del tipo de curso']) !!}
                </div>

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <a href="{{ url()->previous() }}" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Omitir y volver a la vista anterior"><i class="fas fa-arrow-circle-left mr-2"></i>Volver atrás</a>

                {!! Form::submit('Actualizar tipo', ['class' => 'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script></script>
@stop

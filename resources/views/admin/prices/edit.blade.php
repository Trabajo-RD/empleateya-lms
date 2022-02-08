@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('content_header')
    {{-- <a href="{{ route( 'admin.prices.create', app()->getLocale() ) }}" class="btn btn-secondary float-right"><i class="fas fa-plus mr-1"></i>Nuevo precio</a> --}}
    <h1 class="text-primary">Editar precio</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($price, ['route' => ['admin.prices.update', [app()->getLocale(), $price] ], 'method' => 'put' ]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Alias') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese un alias para este precio']) !!}
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    {!! Form::label('value', 'Valor') !!}
                    {!! Form::number('value', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el valor del precio']) !!}
                </div>
                @error('value')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <a href="{{ url()->previous() }}" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Omitir y volver a la vista anterior"><i class="fas fa-arrow-circle-left mr-2"></i>Volver atrás</a>

                {!! Form::submit('Actualizar precio', ['class' => 'btn btn-primary float-right']) !!}
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

@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('content_header')
    <h1 class="text-primary">Añadir Nuevo Rol</h1>
@stop

@section('content')
    <div class="card">
        {!! Form::open(['route' => 'admin.roles.store']) !!}

            @include('admin.roles.partials.form')

            <div class="card-footer">
                {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('LMS funcionando!'); </script>
@stop

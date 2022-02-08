@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('content_header')
    <h1 class="text-primary">Editar Rol</h1>
@stop

@section('content')

    @if( session('rol_updated'))
        <div class="alert alert-success" role="alert">
            <strong>¡En hora buena!</strong> {{session('rol_updated')}}
        </div>
    @endif

    <div class="card">
        {!! Form::model($role, ['route' => ['admin.roles.update', [app()->getLocale(), $role]], 'method' => 'put']) !!}

            @include('admin.roles.partials.form')

            <div class="card-footer">
                <a href="{{ url()->previous() }}" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Omitir y volver a la vista anterior"><i class="fas fa-arrow-circle-left mr-2"></i>Volver atrás</a>

                {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary float-right', 'data-toggle' => 'tooltip', 'data-placement' => 'left', 'title' => 'Guardar los cambios realizados']) !!}
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

@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('content_header')
    <h1 class="text-primary">{{ __('Actualizar contraseña') }}</h1>
@stop

@section('content')

    <div class="container">

        @if( session('danger'))
            <div class="alert alert-danger" role="alert">
                <strong>Error</strong> {{session('danger')}}
            </div>
        @endif


        <div class="card">
            {!! Form::model($user, ['route' => ['admin.users.password.updated', $user ], 'method' => 'post']) !!}
                <div class="card-header">
                    <span class="text-primary text-uppercase">Nueva contraseña</span>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="document_id">Documento de identidad</label>
                        <input type="text" class="form-control" id="document_id" name="document_id" placeholder=" Número de Documento de identidad">
                      </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Nueva contraseña">
                      </div>

                </div>
                <div class="card-footer">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Omitir y volver a la vista anterior"><i class="fas fa-arrow-circle-left mr-2"></i>Volver atrás</a>

                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary float-right', 'data-toggle' => 'tooltip', 'data-placement' => 'left', 'title' => 'Guardar los cambios realizados']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{-- <script> console.log('LMS funcionando!'); </script> --}}
@stop

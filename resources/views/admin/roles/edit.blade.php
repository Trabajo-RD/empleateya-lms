@extends('adminlte::page')

@section('title', 'Empleateya LMS')

@section('content_header')
    <h1 class="text-primary"><i class="fas fa-user-cog mr-2"></i>Editar Rol</h1>
@stop

@section('content')

    @if( session('rol_updated'))
        <div class="alert alert-success" role="alert">
            <strong>¡En hora buena!</strong> {{session('rol_updated')}}
        </div>
    @endif

    <div class="card">
        {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
            
            @include('admin.roles.partials.form')

            <div class="card-footer">
                {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary']) !!}
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

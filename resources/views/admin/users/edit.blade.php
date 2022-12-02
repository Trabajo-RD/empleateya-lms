@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('content_header')
    <h1 class="text-primary"><i class="fas fa-user-edit mr-2"></i>Asignar Roles</h1>
@stop

@section('content')

    <div class="container">

        @if( session('success'))
            <div class="alert alert-success" role="alert">
                <strong>¡Completado!</strong> {{session('success')}}
            </div>
        @endif

        @if( session('rol_granted'))
            <div class="alert alert-success" role="alert">
                <strong>¡Completado!</strong> {{session('rol_granted')}}
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <span class="text-primary text-uppercase">Usuario</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <label class="text-muted">Documento: </label>
                        <p class="form-control">{{ $user->document_id }}</p>
                    </div>
                    <div class="col-12 col-md-9">
                        <label class="text-muted">Nombre: </label>
                        <p class="form-control">{{ $user->name }} {{ $user->lastname }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <label class="text-muted">Correo: </label>
                        <p class="form-control">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            
                <div class="card-header">
                    <span class="text-primary text-uppercase">Password</span>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="password">Resetear la contraseña del usuario</label>
                        <p>Deseas asignar una nueva contraseña a este usuario?</p>
                      </div>                 
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary" href="{{ route('admin.users.reset.password', $user) }}">Asignar nueva contraseña</a>
                </div>
           
        </div>



        <div class="card">
            {!! Form::model($user, ['route' => ['admin.users.update', $user ], 'method' => 'put']) !!}
                <div class="card-header">
                    <span class="text-primary text-uppercase">Roles</span>
                </div>
                <div class="card-body">

                    @foreach( $roles as $role )

                        <div>
                            <label>
                                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                {{ $role->name }}
                            </label>
                        </div>

                    @endforeach

                </div>
                <div class="card-footer">
                    {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('LMS funcionando!'); </script>
@stop
@extends('adminlte::page')

@section('title', 'Empleateya LMS')

@section('content_header')
    <a href="{{ route('admin.platforms.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Nueva plataforma</a>
    <h1 class="text-dark">Plataformas</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            Listado de plataformas
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $platforms as $platform )
                        <tr>
                            <td width="10px">{{ $platform->id }}</td>
                            <td>{{ $platform->name }}</td>
                            <td width="12%">
                                <a href="{{ route('admin.platforms.edit', $platform) }}" class="btn btn-outline-secondary"><i class="far fa-edit mr-1"></i>Editar</a>
                            </td>
                            <td width="14%">
                                <form action="{{ route( 'admin.platforms.destroy', $platform ) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger" type="submit"><i class="far fa-trash-alt mr-1"></i>Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-sm text-muted">
            Las <strong>plataformas</strong> nos sirven para asociar a una lección, un video compartido desde una URL externa. Además, se utiliza para incrustar dicho video dentro del sistema.
        </div>
    </div>
@stop



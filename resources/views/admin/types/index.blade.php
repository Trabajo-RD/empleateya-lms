@extends('adminlte::page')

@section('title', 'Empleateya LMS')

@section('content_header')
    <a href="{{ route('admin.types.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Nuevo tipo</a>
    <h1 class="text-dark">Tipos de curso</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            Listado de tipos de curso
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
                    @foreach( $types as $type )
                        <tr>
                            <td width="10px">{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>
                            <td width="12%">
                                <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-outline-secondary"><i class="far fa-edit mr-1"></i>Editar</a>
                            </td>
                            <td width="14%">
                                <form action="{{ route( 'admin.types.destroy', $type ) }}" method="POST">
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
    </div>
@stop



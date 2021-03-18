@extends('adminlte::page')

@section('title', 'Empleateya LMS')

@section('content_header')
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Nueva categoría</a>
    <h1 class="text-primary"><i class="fas fa-tags mr-1"></i>Categorías</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            Listado de categorías
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
                    @foreach( $categories as $category )
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width="12%">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-outline-secondary"><i class="far fa-edit mr-1"></i>Editar</a>
                            </td>
                            <td width="14%">
                                <form action="{{ route( 'admin.categories.destroy', $category ) }}" method="POST">
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



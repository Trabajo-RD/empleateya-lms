@extends('adminlte::page')

@section('title', 'Empleateya LMS')

@section('content_header')
    <a href="{{ route('admin.partners.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Nueva asociación</a>
    <h1 class="text-primary"><i class="far fa-handshake mr-1"></i>Asociaciones y Convenios</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            Listado de asociaciones
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $partners as $partner )
                        <tr>
                            <td width="10px">{{ $partner->id }}</td>
                            <td>{{ $partner->name }}</td>
                            <td>
                                @switch($partner->visible)
                                @case(1)
                                    <span class="badge badge-warning">Ocultar</span>
                                    @break
                                @case(2)
                                    <span class="badge badge-success">Mostrar</span>
                                    @break
                                @default

                            @endswitch
                            </td>
                            <td width="12%">
                                <a href="{{ route('admin.partners.edit', $partner) }}" class="btn btn-outline-secondary"><i class="far fa-edit mr-1"></i>Editar</a>
                            </td>
                            <td width="14%">
                                <form action="{{ route( 'admin.partners.destroy', $partner ) }}" method="POST">
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



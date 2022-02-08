@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1 class="text-dark">Categorías</h1>
@stop

@section('content')

    {{-- @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif --}}

    <div class="card">

        <div class="card-header">
            <a href="{{ route('admin.categories.create', app()->getLocale() ) }}" class="btn btn-primary float-left" data-toggle="tooltip" data-placement="bottom" title="Añade una nueva categoría">
            <i class="fas fa-plus mr-1"></i>Añadir categoría</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Icono</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $categories as $category )
                        <tr>
                            <td width="10px">{{ $category->id }}</td>
                            <td width="10px" class="text-center" data-toggle="tooltip" data-placement="right" title="{{$category->icon}}">
                                <i class="{{ ($category->icon != '' ? $category->icon : 'fas fa-ban text-red') }}"></i>
                            </td>
                            <td>{{ $category->name }}</td>
                            <!-- button -->
                            <td width="12%">
                                <a href="{{ route('admin.categories.edit', [app()->getLocale(), $category] ) }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Editar {{$category->name}}"><i class="far fa-edit mr-1"></i>Editar</a>
                            </td>
                            <td width="14%">
                                <form action="{{ route( 'admin.categories.destroy', [app()->getLocale(), $category] ) }}" method="POST" class="delete-category">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger" type="submit" data-toggle="tooltip" data-placement="left" title="Eliminar {{$category->name}}"><i class="far fa-trash-alt mr-1"></i>Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-sm text-muted">
            Las <strong>categorías</strong> nos permiten asociar un curso a una categoría específica, para una mejor organización.
        </div>
    </div>
@stop

@section('js')

    <script src="{{ asset('js/admin/categories/form.js') }}"></script>

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminada!',
                'Se eliminó la categoría solicitada.',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-category').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar esta categoría?',
            text: "La operación no podrá ser revertida y los cursos que hayan sido asignados a esta categoría serán mostrados 'Sin categoría'!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.value) {

                // Submit the form
                this.submit();

            }
            })
        });
    </script>
@stop

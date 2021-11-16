@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1 class="text-dark">Etiquetas</h1>
@stop

@section('content')

    {{-- @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif --}}

    <div class="card">        

        <div class="card-header">
            <a href="{{ route('admin.tags.create' ) }}" class="btn btn-primary float-left" data-toggle="tooltip" data-placement="bottom" title="Añade una nueva etiqueta">
            <i class="fas fa-plus mr-1"></i>Añadir etiqueta</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Icono</th>
                        <th>Nombre</th>
                        <th class="text-center">Subcategoría padre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $tags as $tag )
                        <tr>
                            <td width="10px">{{ $tag->id }}</td>
                            <td width="10px" class="text-center" data-toggle="tooltip" data-placement="right" title="{{$tag->icon}}">
                                <i class="{{ ($tag->icon != '' ? $tag->icon : 'fas fa-ban text-red') }}"></i>
                            </td>
                            <td>{{ $tag->name }}</td>
                            <td class="text-center">{{ $tag->topic->name }}</td>
                            <td width="12%">
                                <a href="{{ route('admin.tags.edit', $tag ) }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Editar {{$tag->name}}"><i class="far fa-edit mr-1"></i>Editar</a>
                            </td>
                            <td width="14%">
                                <form action="{{ route( 'admin.tags.destroy', $tag ) }}" method="POST" class="delete-tag">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger" type="submit" data-toggle="tooltip" data-placement="left" title="Eliminar {{$tag->name}}"><i class="far fa-trash-alt mr-1"></i>Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-sm text-muted">
            Las <strong>Etiquetas</strong> nos permiten asociar un curso a una etiqueta, y esta a su vez se asocia a una subcategoría específica, para una mejor organización.
        </div>
    </div>
@stop

@section('js')

    <script src="{{ asset('js/admin/tags/form.js') }}"></script>

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminada!',
                'Se eliminó la etiqueta solicitada.',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-tag').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar esta etiqueta?',
            text: "La operación no podrá ser revertida y los cursos que hayan sido asignados a esta etiqueta serán mostrados 'Sin etiqueta'!",
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

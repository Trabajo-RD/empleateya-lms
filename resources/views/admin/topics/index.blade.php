@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1 class="text-dark">Subcategorías o Temas</h1>
@stop

@section('content')

    {{-- @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif --}}

    <div class="card">

        <div class="card-header">
            <a href="{{ route('admin.topics.create') }}" class="btn btn-primary float-left" data-toggle="tooltip" data-placement="bottom" title="Añade una nueva subcategoría">
            <i class="fas fa-plus mr-1"></i>Añadir subcategoría</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Icono</th>
                        <th>Nombre</th>
                        <th class="text-center">Categoría padre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $topics as $topic )
                        <tr>
                            <td width="10px">{{ $topic->id }}</td>
                            <td width="10px" class="text-center" data-toggle="tooltip" data-placement="right" title="{{$topic->icon}}">
                                <i class="{{ ($topic->icon != '' ? $topic->icon : 'fas fa-ban text-red') }}"></i>
                            </td>
                            <td>{{ $topic->name }}</td>
                            <td class="text-center">{{ $topic->category->name }}</td>
                            <!-- button -->
                            <td width="12%">
                                <a href="{{ route('admin.topics.edit', $topic ) }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Editar {{$topic->name}}"><i class="far fa-edit mr-1"></i>Editar</a>
                            </td>
                            <!-- button -->
                            <td width="14%">
                                <form action="{{ route( 'admin.topics.destroy', $topic ) }}" method="POST" class="delete-topic">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger" type="submit" data-toggle="tooltip" data-placement="left" title="Eliminar {{$topic->name}}"><i class="far fa-trash-alt mr-1"></i>Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-sm text-muted">
            Las <strong>subcategorías o temas</strong> nos permiten asociar un curso a una subcategoría o tema, y esta a su vez se asocia a una categoría específica, para una mejor organización.
        </div>
    </div>
@stop

@section('js')

    <script src="{{ asset('js/admin/topics/form.js') }}"></script>

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminada!',
                'Se eliminó la subcategoría solicitada.',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-topic').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar esta subcategoría?',
            text: "La operación no podrá ser revertida y los cursos que hayan sido asignados a esta subcategoría serán mostrados 'Sin subcategoría'!",
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

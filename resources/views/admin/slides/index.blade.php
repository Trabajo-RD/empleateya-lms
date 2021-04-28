@extends('adminlte::page')

@section('title', 'Empleateya LMS')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <a href="{{ route('admin.slides.create' ) }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Nuevo slide</a>
    <h1 class="text-dark">Sliders</h1>
@stop

@section('content')

    {{-- @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif --}}

    <div class="card">
        <div class="card-header">
            Lista de slides
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $slides as $slide )
                        <tr>
                            <td width="10px">{{ $slide->id }}</td>
                            <td>{{ $slide->title }}</td>
                            <td width="12%">
                                <a href="{{ route('admin.slides.edit', $slide ) }}" class="btn btn-outline-secondary"><i class="far fa-edit mr-1"></i>Editar</a>
                            </td>
                            <td width="14%">
                                <form action="{{ route( 'admin.slides.destroy', $slide ) }}" method="POST" class="delete-slide">
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
            Loss <strong>slides</strong> son mostrados en la portada, en la sección Hero, si no se crea un slide se asignara uno por defecto.
        </div>
    </div>
@stop

@section('js')

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Se ha eliminado el slide.',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-slide').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar este slide?',
            text: "La operación no podrá ser revertida y este slide no será mostrado en la portada'!",
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

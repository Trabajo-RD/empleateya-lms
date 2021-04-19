@extends('adminlte::page')

@section('title', 'Empleateya LMS')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <a href="{{ route( 'admin.prices.create' ) }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Nuevo precio</a>
    <h1 class="text-dark">Precios</h1>
@stop

@section('content')

    {{-- @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif --}}

    <div class="card">
        <div class="card-header">
            Listado de precios
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
                    @foreach( $prices as $price )
                        <tr>
                            <td width="10px">{{ $price->id }}</td>
                            <td>{{ $price->name }}</td>
                            <td width="12%">
                                <a href="{{ route('admin.prices.edit', $price ) }}" class="btn btn-outline-secondary"><i class="far fa-edit mr-1"></i>Editar</a>
                            </td>
                            <td width="14%">
                                <form action="{{ route( 'admin.prices.destroy', $price ) }}" method="POST" class="delete-price">
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
            El <strong>precio</strong> o costo del curso. En caso de ser Gratuito, el valor debe ser igual a cero (0).
        </div>
    </div>
@stop


@section('js')

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'El precio ha sido eliminado.',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-price').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar este precio?',
            text: "La operación no podrá ser revertida y los cursos que hayan sido asignados a este precio serán mostrados 'Sin precio definido'!",
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

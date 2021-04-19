@extends('adminlte::page')

@section('title', 'Empleateya LMS')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <a href="{{ route('admin.items.create', app()->getLocale() ) }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Nuevo item</a>
    <h1 class="text-dark">Menu Items</h1>
@stop

@section('content')

    {{-- @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif --}}

    <div class="card">
        <div class="card-header">
            Listado de items
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ruta</th>
                        <th>Estado</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse( $items as $item )
                        <tr>
                            <td width="10px">{{ $item->id }}</td>
                            <td class="align-middle {{ (($item->status == 1) ? 'text-muted' : '') }}">{{ $item->name }}</td>
                            <td class="align-middle {{ (($item->status == 1) ? 'text-muted' : '') }}">{{ $item->link }}</td>
                            <td class="align-middle">
                                @switch($item->status)
                                @case(1)
                                    <span class="badge py-2 px-2 text-uppercase text-md text-muted" title="Oculto"><i class="far fa-eye-slash"></i></span>
                                    @break
                                @case(2)
                                    <span class="badge py-2 px-2 text-uppercase text-md" title="Visible"><i class="far fa-eye"></i></span>
                                    @break
                                @default

                            @endswitch
                            </td>
                            <td width="12%" class="align-middle">
                                <a href="{{ route('admin.items.edit', [app()->getLocale(), $item] ) }}" class="btn btn-outline-secondary"><i class="far fa-edit mr-1"></i>Editar</a>
                            </td>
                            <td width="14%" class="align-middle">
                                <form action="{{ route( 'admin.items.destroy', [app()->getLocale(), $item] ) }}" method="POST" class="delete-item">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger" type="submit"><i class="far fa-trash-alt mr-1"></i>Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-light" role="alert">
                                    Hasta el momento no existe un item de menú registrado.
                                  </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer text-sm text-muted">
            Los <strong>items</strong> hacen referencia a los enlaces que serán mostrados en el menú principal.
        </div>
    </div>
@stop

@section('js')

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Se ha eliminado el item solicitado.',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-item').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar este item del menú?',
            text: "La operación no podrá ser revertida y se eliminarán los enlaces con las páginas asociadas a este item ",
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

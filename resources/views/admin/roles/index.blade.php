@extends('adminlte::page')

@section('title', 'Capacítate RD - Roles')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Nuevo rol</a>
    <h1 class="text-dark">Roles</h1>
@stop

@section('content')

    @if( session('rol_created'))
        <div class="alert alert-success" role="alert">
            <strong>¡En hora buena!</strong> {{session('rol_created')}}
        </div>
    @endif

    {{-- @if( session('rol_destroyed'))
        <div class="alert alert-danger" role="alert">
            <strong>¡Registro eliminado!</strong> {{session('rol_destroyed')}}
        </div>
    @endif --}}

    <div class="card">
        {{-- <div class="card-header">
            <a href="{{ route('admin.roles.create') }}">Añadir nuevo</a>
        </div> --}}
        <div class="card-body shadow-sm">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $roles as $role )
                        @if(  $role )
                        <tr>
                            <td width="10px">{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td width="10px">
                                <a class="btn btn-outline-secondary" href="{{ route('admin.roles.edit', $role ) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.roles.destroy', $role ) }}" method="POST" class="delete-role">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-outline-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="4" class="text-gray">
                                <div class="info-box bg-gradient-warning">
                                <span class="info-box-icon"><i class="fas fa-info-circle"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Por el momento no se ha añadido un rol, haz click en <b>Añadir nuevo</b> para crearlo.</span>
                                </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    {{-- Create confirmed --}}
    @if (session('create') == 'success')
    <script>
        Swal.fire(
            'Creado!',
            'Has creado satisfactoriamente un nuevo rol.',
            'success'
            );
    </script>
    @endif

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'El rol ha sido eliminado',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-role').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar este rol?',
            text: "La operación no podrá ser revertida y los usuarios que hayan sido asignados a este rol quedarán 'Sin rol definido' y sin los permisos que tenía asignados!",
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

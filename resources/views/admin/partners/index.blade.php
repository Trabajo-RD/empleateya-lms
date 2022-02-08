@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <a href="{{ route('admin.partners.create', app()->getLocale() ) }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Nueva sociedad</a>
    <h1 class="text-primary">Sociedades y Convenios</h1>
@stop

@section('content')

    {{-- @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif --}}

    <div class="card">
        <div class="card-header">
            Listado de sociedades
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse( $partners as $partner )
                        <tr>
                            <td class="align-middle" width="15%">

                                    @isset( $partner->image )
                                        <img id="picture" class="img-fluid" src="{{ Storage::url($partner->image->url) }}" alt="" style="max-height: 75px;">
                                    @else
                                        <img id="picture" class="img-fluid" src="{{ asset('images/courses/logo-cloud.png') }}" alt="" style="max-height: 75px;" >
                                    @endisset

                            </td>
                            <td class="align-middle {{ (($partner->status == 1) ? 'text-muted' : '') }}">{{ $partner->title }}</td>
                            <td class="align-middle">
                                @switch($partner->status)
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
                                <a href="{{ route('admin.partners.edit', [app()->getLocale(), $partner] ) }}" class="btn btn-outline-secondary"><i class="far fa-edit mr-1"></i>Editar</a>
                            </td>
                            <td width="14%" class="align-middle">
                                <form action="{{ route( 'admin.partners.destroy', [app()->getLocale(), $partner] ) }}" method="POST" class="delete-partner">
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
                                    Por el momento no se han registrado sociedades ni convenios.
                                  </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer text-sm text-muted">
            Las <strong>sociedades</strong> cuyo estatus sea "VISIBLE" se mostrarán en la página principal, en la sección "Partnerships". Hacen referencia a aquellas instituciones o empresas con las cuales se tiene algún acuerdo o convenio.
        </div>
    </div>
@stop


@section('js')

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminada!',
                'La asociación ha sido eliminada correctamente.',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-partner').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar esta sociedad?',
            text: "La operación no podrá ser revertida y la información no será mostrada en la página!",
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

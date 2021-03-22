@extends('adminlte::page')

@section('title', 'Empleateya LMS')

@section('content_header')
    <a href="{{ route('admin.partners.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Nueva sociedad</a>
    <h1 class="text-dark">Sociedades y Convenios</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

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
                            <td class="align-middle">{{ $partner->name }}</td>
                            <td class="align-middle">
                                @switch($partner->visible)
                                @case(1)
                                    <span class="badge badge-warning py-2 px-2 text-uppercase text-md">Oculto</span>
                                    @break
                                @case(2)
                                    <span class="badge badge-success py-2 px-2 text-uppercase text-md">Visible</span>
                                    @break
                                @default

                            @endswitch
                            </td>
                            <td width="12%" class="align-middle">
                                <a href="{{ route('admin.partners.edit', $partner) }}" class="btn btn-outline-secondary"><i class="far fa-edit mr-1"></i>Editar</a>
                            </td>
                            <td width="14%" class="align-middle">
                                <form action="{{ route( 'admin.partners.destroy', $partner ) }}" method="POST">
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



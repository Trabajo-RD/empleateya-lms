@extends('adminlte::page')

@section('title', 'Capacítate')

@section('content_header')
    <h1 class="text-dark">Cursos</h1>
@stop

@section('content')

    @livewire('admin.courses-index')

    {{-- <p class="text-secondary">Listado de todos los cursos que se encuentran registrados en la plataforma.</p>

    @if( session('success') )

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Usuario</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course )
                        <tr class="items-center">
                            <td width="10px">{{ $course->id }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->category->name }}</td>
                            <td>{{ $course->editor->name }} {{ $course->editor->lastname }}</td>
                            <td>{{ ($course->status == '2') ? 'Publicado' : 'Borrador' }}</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-warning mt-3" role="alert">
                                    Por el momento no existen cursos en revisión.
                                  </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $courses->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div> --}}


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop

@extends('adminlte::page')

@section('title', 'Empleateya LMS')

@section('content_header')
    <h1 class="text-dark">Cursos en revisión</h1>
@stop

@section('content')
    <p class="text-secondary">Listado de todos los cursos que se encuentran pendientes de aprobación.</p>

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
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course )
                        <tr class="items-center">
                            <td width="10px">{{ $course->id }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->category->name }}</td>
                            <td width="12%">
                                <a class="btn btn-outline-secondary" href="{{ route('admin.courses.show', $course ) }}">Revisar</a>
                            </td>
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
    </div>

    {{-- <div class="card">
        <div class="card-body">
           <!-- TODO: uncomment if Microsoft Learning API is enabled -->
           @php echo print_r($microsoft_courses['results'][0]) @endphp

            @foreach( $microsoft_courses['results'] as $ms_course)

                    <p>{{$ms_course['url']}}</p>

            @endforeach
        </div>
    </div> --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop

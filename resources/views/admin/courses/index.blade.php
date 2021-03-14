@extends('adminlte::page')

@section('title', 'Empleateya LMS')

@section('content_header')
    <h1 class="text-primary"><i class="far fa-edit mr-2"></i>Cursos en revisión</h1>
@stop

@section('content')
    <p>Listado de todos los cursos que se encuentran pendientes de aprobación.</p>

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
                    @foreach ($courses as $course )
                        <tr class="items-center">
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->category->name }}</td>
                            <td>
                                <a class="btn btn-primary" href="">Revisar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $courses->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

    <div class="card">
        <div class="card-body">
           <!-- TODO: uncomment if Microsoft Learning API is enabled -->
           @php echo print_r($microsoft_courses['results'][0]) @endphp

            @foreach( $microsoft_courses['results'] as $ms_course)

                    <p>{{$ms_course['url']}}</p>

            @endforeach
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('LMS funcionando!'); </script>
@stop

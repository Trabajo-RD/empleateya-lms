@extends('adminlte::page')

@section('title', 'Capacítate RD - Student Courses')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1 class="text-dark">Cursos</h1>
@stop

@section('content')

    <div class="card">

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
                    @forelse ( $courses as $course )
                        @if(  $course )
                        <tr>
                            <td width="10px">{{ $course->id }}</td>
                            <td>{{ $course->title }}</td>
                            <td width="10px">
                                <a class="btn btn-outline-secondary" href="{{ route('courses.status', $course ) }}">Continuar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('student.dashboard.courses.destroy', $course ) }}" method="POST" class="delete-course">
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
                                    <span class="info-box-text">Por el momento no te has matriculado en un curso, visita el <b>Cátalogo de Cursos</b> para matricularte en un curso.</span>
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

    <script>

        $('.delete-course').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar este curso de tu lista?',
            text: "La operación no podrá ser revertida y se perderan los datos del avance del curso!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#EE2A24',
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

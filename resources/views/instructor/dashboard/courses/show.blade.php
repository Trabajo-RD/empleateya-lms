@extends('adminlte::page')

@section('title', 'Capacítate RD - Course Details')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <a href="{{ route('instructor.dashboard.course.settings', $course) }}" class="btn btn-default float-right">
        {{ Lang::get('Course Settings') }}
        <i class="fas fa-cog ml-1"></i>
    </a>
    <h1 class="color-primary">{{ Lang::get('Course Details') }}</h1>
@stop

@section('content')

    @if( session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            {{ session('success') }}
        </div>
    @endif

    @if( session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            {{ session('info') }}
        </div>
    @endif

    @if( session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            {{ session('error') }}
        </div>
    @endif


    {{-- @if( session('rol_destroyed'))
        <div class="alert alert-danger" role="alert">
            <strong>¡Registro eliminado!</strong> {{session('rol_destroyed')}}
        </div>
    @endif --}}

    <div class="d-flex align-items-center justify-content-between mb-3 text-muted">
        <a href="{{ route('instructor.dashboard.courses.index') }}" class="mr-auto">
            <i class="fas fa-arrow-left mr-2"></i>{{ Lang::get('Go back') }}
        </a>
    </div>

    <div class="row">
        <!-- left -->
        <div class="col-md-7">
            <div class="card">
                <img class="card-img-top rounded" src=
                "{{ Storage::url($course->image->url) }}">
                 
                <div class="card-img-overlay card-inverse d-flex flex-column">
                    <div class="text-left mb-2">
                        <div class="col-sm-2 mb-2"><span class="badge badge-pill badge-light text-uppercase">{{ $course->type->name }}</span></div>
                        <h4 class="text-stroke text-white pb-5">
                            {{ $course->title }}
                        </h4>
                    </div>
                     
                    <div class="card-block pt-5 mt-auto">
                        <a href="{{ route('courses.show', $course) }}" target="_blank" class="btn btn-light rounded text-uppercase">
                            {{ Lang::get('View Course') }}
                            <i class="fas fa-external-link-alt ml-2"></i>
                        </a>
                         
                    </div>
                </div>               
            </div>

            <h4 class="color-primary font-weight-bold">{{ Lang::get('Statistics') }}</h4>

            <!-- Info boxes -->
            <div class="row">

                <!-- col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <!--info-box-->
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h3>{{ count($participants) }}</h3>
                        <p>{{ Str::plural( __('Participants'), count($participants)) }}</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-user-graduate"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <!--info-box-->
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                        <h3>44</h3>
                        <p>User Registrations</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <!-- col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <!--info-box-->
                    <div class="small-box bg-warning">
                        <div class="inner">
                        <h3>44</h3>
                        <p>User Registrations</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                
                <!-- col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <!--info-box-->
                    <div class="small-box bg-gradient-danger">
                        <div class="inner">
                        <h3>44</h3>
                        <p>User Registrations</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

            </div><!-- /.row -->

            <h4 class="color-primary font-weight-bold">{{ Lang::get('Participants') }}</h4>

            <div class="row">
                <div class="col-md-12">
                    @forelse($participants as $participant)
                        <div class="d-flex">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-gradient-info elevation-1"><i class="fas fa-user-graduate"></i></span>
              
                                <div class="info-box-content">
                                  <span class="info-box-number">
                                    {{ $participant->name}} {{ $participant->lastname }}
                                    <small>
                                        @php
                                            switch ($participant->gender) {
                                                case 'M':
                                                    echo '<i class="text-muted fas fa-mars ml-2"></i>';
                                                    break;
                                                case 'F':
                                                    echo '<i class="text-muted fas fa-venus ml-2"></i>';
                                                    break;
                                                case 'O':
                                                    echo '<i class="text-muted fas fa-dna ml-2"></i>';
                                                    break;
                                                default:
                                                    echo '<i class="text-muted fas fa-question ml-2"></i>';
                                                    break;
                                            }
                                        @endphp
                                    </small>
                                </span>
                                  <span class="info-box-text">{{ $participant->email }}</span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                        </div>
                        @empty 
    
                        @endforelse
                </div>
            </div>

        </div>

        <div class="col-md-4 offset-md-1">
            <div class="card">
                <div class="card-body">
                    costo
                </div>
            </div>

            <h2 class="mb-4">Laravel Bootstrap Datepicker Demo</h2>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
                </span>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

    {{-- Create confirmed --}}
    @if (session('create') == 'success')
    <script>
        Swal.fire(
            'Creado!',
            'Has creado satisfactoriamente un nuevo curso.',
            'success'
            );
    </script>
    @endif

    {{-- Delete confirmed --}}
    @if (session('delete') == 'success')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'El curso ha sido eliminado',
                'success'
                );
        </script>
    @endif

    <script>

        $('.delete-course').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro que quieres eliminar este curso?',
            text: "La operación no podrá ser revertida y los usuarios que se hayan enrolado a este curso no podrán matricularse!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#003876',
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

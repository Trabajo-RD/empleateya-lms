@extends('adminlte::page')

@section('title', 'Capacítate RD - Path Modules')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1 class="color-primary">{{ $path->title }}</h1>
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

    {{-- @if( session('rol_destroyed'))
        <div class="alert alert-danger" role="alert">
            <strong>¡Registro eliminado!</strong> {{session('rol_destroyed')}}
        </div>
    @endif --}}

    <div class="d-flex align-items-center justify-content-between mb-3 text-muted">
        <a href="{{ route('instructor.dashboard.paths.index') }}" class="mr-auto">
            <i class="fas fa-arrow-left mr-2"></i>{{ Lang::get('Go back') }}
        </a>
    </div>

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mr-auto">{{ Lang::get('Modules') }}</h3>

            {{-- <a href="{{ route('instructor.dashboard.courses.sections.create', $course) }}" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>{{ Lang::get('Add Section') }}</a> --}}

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-accent ml-2" data-toggle="modal" data-target="#add-section-modal">
                <i class="fas fa-plus mr-2"></i>{{ Lang::get('Add Module') }}
            </button>


        </div>


            @if(count($modules))
                <div class="card-body shadow-sm">

                    @error('modules')
                        <small class="text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror

                    <div class="card shadow mt-3">
                        <div class="card-body">
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>{{ Lang::get('Title') }}</th>
                                        <th colspan="4"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($modules as $module)
                                        <tr>
                                            <td>
                                                <span class="font-weight-normal color-primary">{{ $module->title }}</span><br>
                                                <div class="d-flex align-items-center justify-content-start gap-2">
                                                    @if($module->units_count > 0)
                                                        <small class="text-muted">
                                                            <i class="fas fa-chalkboard mr-2"></i>{{ $module->units_count }} {{ Str::plural( __('Units'), $module->units_count) }}
                                                        </small>
                                                    @endif
                                                </div>
                                            </td>
                                            <td width="10px">
                                                <a class="btn btn-sm btn-outline-info d-flex align-items-center flex-nowrap" href="#">
                                                    <i class="fas fa-chalkboard mr-2"></i>
                                                    {{ Lang::get('Units') }}
                                                </a>
                                            </td>
                                            <td width="10px">
                                                <a class="btn btn-sm btn-outline-secondary d-flex align-items-center flex-nowrap" href="#">
                                                    <i class="fas fa-edit mr-2"></i>
                                                    {{ Lang::get('Edit') }}
                                                </a>
                                            </td>
                                            <td width="10px">
                                                <form action="#" method="POST" class="delete-section">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-sm btn-outline-danger d-flex align-items-center flex-nowrap" type="submit">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        {{ Lang::get('Delete') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <x-bootstrap.pagination.links :model="$modules"></x-bootstrap.pagination.links>
                        </div>
                    </div>

                </div><!--card-body-->
            @endif

    </div>

    <!-- Modal -->
  {{-- <div class="modal fade" id="add-section-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">

    {!! Form::open(['route' => ['instructor.dashboard.courses.sections.store', $course]]) !!}

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary" id="modalLabel">{{ Lang::get('New Section') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body"> --}}
            <!-- Content here -->


            <!--name -->
            {{-- <div class="form-group input-group-lg">
                {!! Form::label('name', Lang::get('Name')) !!}
                <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
                {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid': ''), 'placeholder' => 'Ingresa el nombre de la Sección']) !!}
                @error('name')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> --}}

                    <!-- slug -->
                    {{-- <div class="form-group mb-3">
                        {!! Form::label( 'slug', Lang::get('Slug') ) !!}
                        {!! Form::text('slug', null, ['readonly' => 'readonly', 'class' => 'form-control' ]) !!}
                    </div> --}}

                    <!--summary-->
                    {{-- <div class="form-group mb-3">
                        {!! Form::label('summary', 'Descripción') !!}
                        <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
                        {!! Form::textarea('summary', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Ingrese una descripción',
                            'rows' => 5,
                        ]) !!}
                        @error('summary')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>




                <div class="p-4">
                    <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
                    <small class="text-danger">{{ Lang::get('Required fields') }}</small>
                </div> --}}





          <!-- Content here -->
        {{-- </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {!! Form::submit( Lang::get('Add Section'), ['class' => 'btn btn-primary shadow']) !!}
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div><!-- modal --> --}}
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

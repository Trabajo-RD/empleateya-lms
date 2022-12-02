@extends('adminlte::page')

@section('title', 'Capacítate RD - Create Path')

@section('plugins.Sweetalert2', true)

@section('content_header')
    {{-- <a href="{{ route('instructor.dashboard.courses.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Añadir Nuevo</a> --}}
    <h1 class="text-dark">Añadir Ruta</h1>
@stop

@section('content')

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <strong>Atención!</strong> Asegurate de haber creado previamente los <strong>Módulos</strong> que deseas incluir en esta <strong>Ruta de Aprendizaje</strong>.
    </div>

    <div class="card">
        {!! Form::open(['route' => 'instructor.dashboard.paths.store', 'files' => true]) !!}
            <div class="card-body shadow-sm">

                <!--title -->
                <div class="form-group">
                    {!! Form::label('title', 'Título*') !!}
                    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa el título de la ruta']) !!}
                    @error('title')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="card shadow mt-4">
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- program -->
                            <div class="col-md-4 form-group mb-3">
                                {!! Form::label('program_id', Lang::get('Program')) !!}
                                {!! Form::select('program_id', $programs, null, ['class' => 'form-control', 'placeholder' => 'Asigna esta ruta a un programa']) !!}
                            </div>
                            <!-- topic -->
                            <div class="col form-group mb-3">
                                {!! Form::label('topic_id', Lang::get('Topic')) !!}
                                {!! Form::select('topic_id', $topics, null, ['class' => 'form-control', 'placeholder' => 'Selecciona un tema']) !!}
                            </div>
                        </div>

                        <!-- slug -->
                        <div class="form-group mb-3">
                            {!! Form::label( 'slug', Lang::get('Slug') ) !!}
                            {!! Form::text('slug', null, ['readonly' => 'readonly', 'class' => 'form-control' ]) !!}
                        </div>

                        <!--subtitle -->
                        <div class="form-group mb-3">
                            {!! Form::label('subtitle', Lang::get('Subtitle')) !!}
                            {!! Form::text('subtitle', null, ['class' => 'form-control', 'placeholder' => 'Ingresa un subtítulo para esta ruta']) !!}
                        </div>

                        <!--summary-->
                        <div class="form-group mb-3">
                            {!! Form::label('summary', Lang::get('Description')) !!}
                            {!! Form::textarea('summary', null, [
                                'id' => 'summary',
                                'class' => 'form-control',
                                'placeholder' => 'Ingrese una descripción',
                                'rows' => 5,
                            ]) !!}
                            @error('summary')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <p class="text-muted">Si el participante puede llevar el avance de esta Ruta de Aprendizaje en otra plataforma, puedes añadir un enlace externo para ser mostrado junto a esta ruta.</p>
                        <div class="form-group">
                            {!! Form::label('url', 'URL Externa') !!}
                            {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Ingresa una URL válida']) !!}
                            @error('url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row g-2">
                            <!-- level -->
                            <div class="col-md-3 form-group mb-3">
                                {!! Form::label('level_id', Lang::get('Level')) !!}
                                {!! Form::select('level_id', $levels, null, ['class' => 'form-control', 'placeholder' => 'Nivel de aprendizaje recomendado']) !!}
                            </div>

                            <!-- modality -->
                            <div class="col-md-3 form-group mb-3">
                                {!! Form::label('modality_id', Lang::get('Modality')) !!}
                                {!! Form::select('modality_id', $modalities, null, ['class' => 'form-control', 'placeholder' => 'Modalidad de aprendizaje']) !!}
                            </div>

                            <!-- language -->
                            <div class="col-md-3 form-group mb-3">
                                {!! Form::label('language_id', Lang::get('Language')) !!}
                                {!! Form::select('language_id', $languages, null, ['class' => 'form-control', 'placeholder' => 'Idioma de la ruta de aprendizaje']) !!}
                            </div>

                            <!-- duration -->
                            <div class="col-md-3 form-group mb-3">
                                {!! Form::label('duration_in_minutes', Lang::get('Duration in minutes')) !!}
                                {!! Form::number('duration_in_minutes', null, ['class' => 'form-control' ]) !!}
                                @error('duration_in_minutes')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row g-3">
                            <!-- price -->
                            <div class="col-md-3 form-group mb-3">
                                {!! Form::label('price_id', Lang::get('Costo')) !!}
                                <span class="tooltip ml-2">
                                    <i class="fas fa-question-circle text-secondary tooltiptext" style="cursor: help;" data-bs-toggle="tooltip" data-bs-placement="top" title="Si la ruta de aprendizaje tiene un costo, puedes asignar un precio, por defecto el costo es Gratis. Si el precio no está en la lista, contacta a un administrador para que agrege el precio a la lista."></i>
                                </span>
                                {!! Form::select('price_id', $prices, null, ['class' => 'form-control', 'placeholder' => 'Selecciona un costo']) !!}
                            </div>
                        </div>
                    </div><!--card-body-->

                    <div class="p-4">
                        <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
                        <small class="text-danger">{{ Lang::get('Required fields') }}</small>
                    </div>
                </div><!--card-->

                <div class="card shadow">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto"><span class="h4 text-primary">{{ Lang::get('Modules') }}</span></div>
                            <div>
                                <a href="{{ route('instructor.dashboard.modules.create') }}" class="btn btn-secondary shadow">{{ Lang::get('Add New') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        @error('modules')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror

                        @if(count($modules))
                            <div class="card shadow mt-3">
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="bg-secondary">
                                            <tr>
                                                <th>{{ Lang::get('Title') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($modules as $module)
                                                <tr>
                                                    <td>
                                                        <label>
                                                            {!! Form::checkbox('modules[]', $module->id, null, ['class' => 'mr-1']) !!}
                                                            {{ $module->title }}
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Crear Ruta', ['class' => 'btn btn-primary shadow']) !!}
            </div>

        {!! Form::close() !!}
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
    <!-- CK Editor WYSIWYG-->
    <script src="{{ asset('js/instructor/courses/custom-ckeditor.js') }}"></script>
    <!-- form js -->
    <script src="{{ asset('js/instructor/courses/form.js') }}"></script>
@stop

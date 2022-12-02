@extends('adminlte::page')

@section('title', 'Capacítate RD - Create Workshop')

@section('plugins.Sweetalert2', true)

@section('content_header')
    {{-- <a href="{{ route('instructor.dashboard.courses.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Añadir Nuevo</a> --}}
    <h1 class="text-dark">{{ Lang::get('Add Workshop') }}</h1>
@stop

@section('content')

    <div class="card">
        {!! Form::open(['route' => 'instructor.dashboard.workshops.store']) !!}
        <div class="card-body shadow-sm">

                <!--title -->
                <div class="form-group mb-3">
                    {!! Form::label('title', 'Título') !!}
                    <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
                    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa el título de la ruta']) !!}
                    @error('title')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="card shadow">
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
                            {!! Form::label('subtitle', 'Subtítulo') !!}
                            {!! Form::text('subtitle', null, ['class' => 'form-control', 'placeholder' => 'Ingresa un subtítulo para esta ruta']) !!}
                        </div>

                        <!--summary-->
                        <div class="form-group mb-3">
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

                        <div class="form-group">
                            {!! Form::label('url', 'URL Externa') !!}
                            <span class="tooltip ml-2">
                                <i class="fas fa-question-circle text-secondary tooltiptext" style="cursor: help;" data-bs-toggle="tooltip" data-bs-placement="top" title="Si la modalidad del Taller será E-Learning, y el participante llevará el avance del mismo en otra plataforma, puedes añadir un enlace externo para ser mostrado junto a este curso."></i>
                            </span>
                            {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Ingresa una URL válida']) !!}
                            @error('url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row g-2">

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

                            <!-- audience -->
                            <div class="col-md-3 form-group mb-3">
                                {!! Form::label('audience', Lang::get('Audience')) !!}
                                {!! Form::number('audience', null, ['class' => 'form-control' ]) !!}
                                @error('audience')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row g-3">
                            <!-- price -->
                            <div class="col-md-3 form-group mb-3">
                                {!! Form::label('price_id', Lang::get('Costo')) !!}
                                <span class="tooltip ml-2">
                                    <i class="fas fa-question-circle text-secondary tooltiptext" style="cursor: help;" data-bs-toggle="tooltip" data-bs-placement="top" title="Si el Taller tiene un costo, puedes asignar uno de esta lista, por defecto el costo es 'Gratis'. Si el costo no está en la lista, contacta a un administrador para que proceda a agregarlo."></i>
                                </span>
                                {!! Form::select('price_id', $prices, null, ['class' => 'form-control', 'placeholder' => 'Selecciona un costo']) !!}
                            </div>
                        </div>

                        <hr>

                        <div class="row g-2">
                            <!-- min age -->
                            <div class="col-md-3 form-group mb-3">
                                {!! Form::label('required_min_age', Lang::get('Min age')) !!}
                                {!! Form::number('required_min_age', null, ['class' => 'form-control' ]) !!}
                                @error('required_min_age')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- max age -->
                            <div class="col-md-3 form-group mb-3">
                                {!! Form::label('required_max_age', Lang::get('Max age')) !!}
                                {!! Form::number('required_max_age', null, ['class' => 'form-control' ]) !!}
                                @error('required_max_age')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="row g-3">
                            <!-- start date -->
                            <div class="col-md-3 form-group mb-3">
                                {!! Form::label('start_date', Lang::get('Start Date')) !!}
                                <span class="tooltip ml-2">
                                    <i class="fas fa-question-circle text-secondary tooltiptext" style="cursor: help;" data-bs-toggle="tooltip" data-bs-placement="top" title="Si se establece una fecha de inicio, los usuarios podrán matricularse, pero no podrán iniciar el taller hasta la fecha establecida."></i>
                                </span>
                                {!! Form::date('start_date', null, ['class' => 'form-control' ]) !!}
                                @error('start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- end date -->
                            <div class="col-md-3 form-group mb-3">
                                {!! Form::label('end_date', Lang::get('End Date')) !!}
                                <span class="tooltip ml-2">
                                    <i class="fas fa-question-circle text-secondary tooltiptext" style="cursor: help;" data-bs-toggle="tooltip" data-bs-placement="top" title="Si se establece una fecha de término, los usuarios no podrán realizar actividades después de la fecha establecida."></i>
                                </span>
                                {!! Form::date('end_date', null, ['class' => 'form-control' ]) !!}
                                @error('end_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('location', Lang::get('Location')) !!}
                            {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Ingresa una dirección']) !!}
                            @error('location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            {!! Form::label('include_certificate', Lang::get('Include Certificate')) !!}
                            {!! Form::checkbox('include_certificate', '1') !!}
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
                            <div class="mr-auto"><span class="h4 text-primary">{{ Lang::get('Activities') }}</span></div>
                            <div>
                                <a href="{{ route('instructor.dashboard.workshops.activities.create') }}" class="btn btn-secondary shadow">{{ Lang::get('Add New') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        @error('activities')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror

                        @if(count($activities))
                            <div class="card shadow mt-3">
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="bg-secondary">
                                            <tr>
                                                <th>Título</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($activities as $activity)
                                                <tr>
                                                    <td>
                                                        <label>
                                                            {!! Form::checkbox('activities[]', $activity->id, null, ['class' => 'mr-1']) !!}
                                                            {{ $activity->name }}
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

            </div><!--card-body-->

            <div class="card-footer">
                {!! Form::submit('Crear Taller', ['class' => 'btn btn-primary shadow']) !!}
            </div>

            {!! Form::close() !!}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

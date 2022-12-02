@extends('adminlte::page')

@section('title', 'Capacítate RD - Create Activity')

@section('plugins.Sweetalert2', true)

@section('content_header')
    {{-- <a href="{{ route('instructor.dashboard.courses.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Añadir Nuevo</a> --}}
    <h1 class="text-dark">{{ Lang::get('Add Activity') }}</h1>
@stop

@section('content')

    <div class="card">
        {!! Form::open(['route' => 'instructor.dashboard.workshops.activities.store']) !!}
            <div class="card-body shadow-sm">

                <!--title -->
                <div class="form-group input-group-lg">
                    {!! Form::label('name', Lang::get('Title')) !!}
                    <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
                    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa el título de la actividad']) !!}
                    @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="card shadow mt-4">
                    <div class="card-body">
                        <!-- slug -->
                        <div class="form-group mb-3">
                            {!! Form::label( 'slug', Lang::get('Slug') ) !!}
                            {!! Form::text('slug', null, ['readonly' => 'readonly', 'class' => 'form-control' ]) !!}
                        </div>

                        <!--summary-->
                        <div class="form-group mb-3">
                            {!! Form::label('summary', Lang::get('Description')) !!}
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
                                <i class="fas fa-question-circle text-secondary tooltiptext" style="cursor: help;" data-bs-toggle="tooltip" data-bs-placement="top" title="Si el participante llevará el avance de esta actividad en otra plataforma, puedes añadir un enlace externo para ser mostrado junto a esta."></i>
                            </span>
                            {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Ingresa una URL válida']) !!}
                            @error('url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row g-2">

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

                        <div class="mb-3">
                            <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
                            <small class="text-danger">{{ Lang::get('Required fields') }}</small>
                        </div>

                    </div>
                </div><!--card-->

                <div class="card shadow mt-4">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto"><span class="h4 text-primary">{{ Lang::get('Tasks') }}</span></div>
                            <div>
                                <a href="{{ route('instructor.dashboard.workshops.activities.tasks.create') }}" class="btn btn-secondary shadow">{{ Lang::get('Add New') }}</a>
                            </div>
                        </div>
                    </div>
                    @if(count($tasks))
                        <div class="card-body">

                            @error('tasks')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror

                            <div class="card shadow mt-3">
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="bg-secondary">
                                            <tr>
                                                <th>{{ Lang::get('Title') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tasks as $task)
                                                <tr>
                                                    <td>
                                                        <label>
                                                            {!! Form::checkbox('tasks[]', $task->id, null, ['class' => 'mr-1']) !!}
                                                            {{ $task->name }}
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div><!--card-body-->
                    @endif
                </div><!--card-->

            </div><!--card-body-->

            <div class="card-footer">
                {!! Form::submit('Añadir Actividad', ['class' => 'btn btn-primary shadow']) !!}
            </div>

            {!! Form::close() !!}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

@extends('adminlte::page')

@section('title', 'Capacítate RD - Add Task')

@section('plugins.Sweetalert2', true)

@section('content_header')
    {{-- <a href="{{ route('instructor.dashboard.courses.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Añadir Nuevo</a> --}}
    <h1 class="text-dark">{{ Lang::get('Add Task') }}</h1>
@stop

@section('content')

    <div class="card">
        {!! Form::open(['route' => 'instructor.dashboard.workshops.activities.tasks.store']) !!}
        <div class="card-body shadow-sm">

                <!--activity id-->
                <input type="hidden" name="activity_id" value="1" />

                <!--title -->
                <div class="form-group mb-3">
                    {!! Form::label('name', Lang::get('Name')) !!}
                    <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
                    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa el nombre de la actividad']) !!}
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
                            {!! Form::label('summary', Lang::get('Summary')) !!}
                            {!! Form::textarea('summary', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Ingrese una descripción',
                                'rows' => 5,
                            ]) !!}
                        </div>

                        <p class="text-muted">Si el participante puede llevar el avance de esta Unidad en otra plataforma, puedes añadir un enlace externo para ser mostrado junto a esta unidad.</p>
                        <div class="form-group">
                            {!! Form::label('url', Lang::get('External Url')) !!}
                            {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Ingresa una URL válida']) !!}
                            @error('url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <!-- Platform -->
                        <div class="col-md-3 form-group mb-3">
                            {!! Form::label('platform_id', Lang::get('Platform')) !!}
                            {!! Form::select('platform_id', $platforms, null, ['class' => 'form-control', 'placeholder' => '--Elige una plataforma--']) !!}
                        </div>
                        </div>

                        <!--iframe-->
                        <div class="form-group mb-3">
                            {!! Form::label('iframe', Lang::get('Add Video')) !!}
                            {!! Form::textarea('iframe', null, [
                                'class' => 'form-control',
                                'placeholder' => Lang::get('Embed iframe code'),
                                'rows' => 5,
                            ]) !!}
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
                    </div><!--card-body-->
                </div><!--card-->

                <div class="card shadow">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto"><span class="h4 text-primary">{{ Lang::get('Resources') }}</span></div>
                            <div>
                                <a href="#" class="btn btn-secondary">{{ Lang::get('Add New') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        @error('resources')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror

                        @if(count($resources))
                            <div class="card shadow mt-3">
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="bg-secondary">
                                            <tr>
                                                <th>Título</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($resources as $resource)
                                                <tr>
                                                    <td>
                                                        <label>
                                                            {!! Form::checkbox('resources[]', $resource['id'], null, ['class' => 'mr-1']) !!}
                                                            {{ $resource['title'] }}
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

                <div class="mb-3">
                    {!! Form::submit(Lang::get('Create Task'), ['class' => 'btn btn-primary']) !!}
                </div>

            </div>
            {!! Form::close() !!}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

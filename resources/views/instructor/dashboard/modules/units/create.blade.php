@extends('adminlte::page')

@section('title', 'Capacítate RD - Add Unit')

@section('plugins.Sweetalert2', true)

@section('content_header')
    {{-- <a href="{{ route('instructor.dashboard.courses.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Añadir Nuevo</a> --}}
    <h1 class="text-dark">{{ Lang::get('Add Unit') }}</h1>
@stop

@section('content')

    <div class="card">
        {!! Form::open(['route' => 'instructor.dashboard.modules.units.store']) !!}
        <div class="card-body shadow-sm">

                <!--title -->
                <div class="form-group mb-3">
                    {!! Form::label('title', Lang::get('Title')) !!}
                    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Ingresa el título de la unidad']) !!}
                    @error('title')
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

                        <!--subtitle -->
                        <div class="form-group mb-3">
                            {!! Form::label('subtitle', Lang::get('Subtitle')) !!}
                            {!! Form::text('subtitle', null, ['class' => 'form-control', 'placeholder' => 'Ingresa un subtítulo para esta ruta']) !!}
                        </div>

                        <!--summary-->
                        <div class="form-group mb-3">
                            {!! Form::label('summary', Lang::get('Summary')) !!}
                            {!! Form::textarea('summary', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Ingrese una descripción',
                                'rows' => 5,
                            ]) !!}
                            @error('summary')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <p class="text-muted">Si el participante puede llevar el avance de esta Unidad en otra plataforma, puedes añadir un enlace externo para ser mostrado junto a esta unidad.</p>
                        <div class="form-group">
                            {!! Form::label('url', Lang::get('External Url')) !!}
                            {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Ingresa una URL válida']) !!}
                            @error('url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!--iframe-->
                        <div class="form-group mb-3">
                            {!! Form::label('iframe', Lang::get('Add a Video')) !!}
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
                    </div>
                </div>

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
                    {!! Form::submit(Lang::get('Create Unit'), ['class' => 'btn btn-primary']) !!}
                </div>

            </div>
            {!! Form::close() !!}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    $(document).ready(function() {
        $("#addResourceModal").modal();
    });

@stop

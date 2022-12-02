@extends('adminlte::page')

@section('title', 'Empleateya LMS')

@section('content_header')
    <h1>Observaciones del curso</h1>
    <h2>{{ $course->title }}</h2>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => [ 'admin.courses.reject', $course] ]) !!}

                <div class="form-group">
                    {!! Form::label('body', 'Observaciones') !!}
                    {!! Form::textarea('body', null) !!}
                    @error('body')
                        <strong class="text-dangerphp">{{ $message }}</strong>
                    @enderror
                </div>

                <a href="{{ url()->previous() }}" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Omitir y volver a la vista anterior"><i class="fas fa-arrow-circle-left mr-2"></i>Volver atrás</a>

                {!! Form::submit('Enviar', ['class' => 'btn btn-primary float-right', 'data-toggle' => 'tooltip', 'data-placement' => 'left', 'title' => 'Enviar observación']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@stop

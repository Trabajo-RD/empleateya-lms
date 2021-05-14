@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('content_header')
    <h1 class="text-primary"><i class="fas fa-plus mr-1"></i>Crear categoría</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categories.store', 'autocomplete' => 'off' ]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoría']) !!}
                </div>

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <!-- course-slug -->
                <div class="form-group">
                    {!! Form::label( 'slug', Lang::get('Slug') ) !!}
                    {!! Form::text('slug', null, ['readonly' => 'readonly', 'class' => 'form-control' ]) !!}
                </div>
                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                 <!-- icon -->
                 <div class="form-group">
                    {!! Form::label( 'icon', Lang::get('Icono') ) !!}
                    {!! Form::text('icon', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la clase del icono desde FontAwesome' ]) !!}
                </div>
                @error('icon')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <!-- course-slug -->
                <div class="form-group">
                    {!! Form::hidden('modality_id', null, ['class' => 'form-control' ]) !!}
                </div>

                {!! Form::submit('Crear categoría', ['class' => 'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        // AUTOMATIC SLUG

        // title listener
        document.getElementById("name").addEventListener('keyup', slugChange);

        // event change
        function slugChange(){
            title = document.getElementById("name").value;
            document.getElementById("slug").value = slug(title);
        }

        // formating slug
        function slug(str){
            var $slug = '';
            var trimmed = str.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            return $slug.toLowerCase();
        }

    </script>
@stop

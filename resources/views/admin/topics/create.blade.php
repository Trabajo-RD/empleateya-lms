@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('content_header')
    <h1 class="text-primary">Añadir subcategoría</h1>
@stop

@section('content')
<div class="row">
    <div class="col col-md-12">
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'admin.topics.store', 'autocomplete' => 'off' ]) !!}

                    @include('admin.topics.partials.form')

                    <a href="{{ url()->previous() }}" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Omitir y volver a la vista anterior"><i class="fas fa-arrow-circle-left mr-2"></i>Volver atrás</a>

                    {!! Form::submit('Añadir subcategoría', ['class' => 'btn btn-primary float-right', 'data-toggle' => 'tooltip', 'data-placement' => 'left', 'title' => 'Añadir esta  subcategoría']) !!}

                {!! Form::close() !!}
            </div>
        </div>


    </div>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{-- jQuery-Plugin-stringToSlug --}}
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script src="{{ asset('js/admin/topics/form.js') }}"></script>

@stop

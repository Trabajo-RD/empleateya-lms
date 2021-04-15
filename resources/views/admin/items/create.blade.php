@extends('adminlte::page')

@section('title', 'Empleateya LMS')

@section('content_header')
    <h1 class="text-primary"><i class="fas fa-plus mr-1"></i>Crear item</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.items.store']) !!}


                @include('admin.items.partials.form')


                {!! Form::submit('Crear item', ['class' => 'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

    <script src="{{ asset('js/admin/partners/form.js') }}"></script> --}}
@stop

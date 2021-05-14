@extends('adminlte::page')

@section('title', 'Capacítate RD')

@section('content_header')
    <a href="{{ route('admin.partners.create' ) }}" class="btn btn-primary float-right"><i class="fas fa-plus mr-1"></i>Nueva sociedad</a>
    <h1><i class="far fa-edit mr-1"></i>Editar sociedad</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($partner, ['route' => ['admin.partners.update', $partner ], 'method' => 'put' ]) !!}

                @include('admin.partners.partials.form')

                {!! Form::submit('Actualizar sociedad', ['class' => 'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

    <script src="{{ asset('js/admin/partners/form.js') }}"></script>
@stop

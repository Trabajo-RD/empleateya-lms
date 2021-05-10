@extends('adminlte::page')

@section('title', 'Capacítate')

@section('content_header')
    <a href="{{ route('admin.published.courses.excel.export' ) }}" class="btn float-right text-white" style="background-color:#1D6F42;"><i class="fas fa-share-square mr-1"></i>Exportar</a>
    <h1 class="text-dark">Cursos publicados</h1>
@stop

@section('content')

    @livewire('admin.courses-published')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop

@extends('adminlte::page')

@section('title', 'Capacítate')

@section('content_header')
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

@extends('adminlte::page')

@section('title', 'Empleateya LMS')

@section('content_header')
    <h1 class="text-primary"><i class="fas fa-users mr-2"></i>Listado de Usuarios</h1>
@stop

@section('content')
    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('LMS funcionando!'); </script>
@stop

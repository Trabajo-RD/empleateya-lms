@extends('adminlte::page')

@section('title', 'Empleateya LMS')

@section('content_header')
    <a href="{{ route('admin.users.excel.export' ) }}" class="btn float-right text-white" style="background-color:#1D6F42;"><i class="fas fa-share-square mr-1"></i>Exportar</a>
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

@extends('adminlte::page')

@section('title', 'Dashboard - Course Creator')

@section('content_header')
    <h1 class="text-primary">Dashboard</h1>
@stop

@section('content')
{{-- <x-admin-layout> --}}
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <!-- hero -->
        @livewire('jumbotron')

        {{-- {{ $course->title }} --}}
        <h3>Latest Courses</h3>
         @livewire('course-card')


        <section class="bg-cover rounded-lg" style="background-image:linear-gradient(rgba(0, 56, 118, 0.7), rgba(35, 73, 116, 0.6)), url({{ asset( 'images/home/slider/hero2.jpg' ) }})">
            <div class="sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg xl:max-w-screen-xl 2xl:max-w-screen-2xl mx-auto px-10 sm:px-6 lg:px-8 py-12">
                <div class="w-full md:w-3/4 lg:w-1/2">
                    <!-- titulo -->
                    <h1 class="text-white font-extrabold text-4xl sm:text-5xl md:text-6xl">{{ __('Capacítate') }}</h1>
                    <!-- parrafo -->
                    <p class="text-white mt-3 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 mb-4">{{ __('In our Learning Management System you will find courses and articles from different areas that will help you in your professional development')}}</p>
                    <!-- Buscador -->
                    {{-- @livewire('search') --}}
                </div>
            </div>
        </section>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>

    <!-- Page Footer -->
    <x-slot name="footer">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap justify-center gap-x-6 gap-y-8 ">
            @livewire('link.social-media', ['icon_class' => 'fab fa-facebook-f'])
        </div>
    </x-slot>

    <!-- Page Copyright -->
    <x-slot name="copyright">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap justify-center gap-x-6 gap-y-8 ">
            &copy;Ministerio de Trabajo 2021
        </div>
    </x-slot>

{{-- </x-admin-layout> --}}
@stop

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <!-- Google Font: Source Sans Pro -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
    <!-- Font Awesome Icons -->
    {{-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> --}}
    <!-- overlayScrollbars -->
    {{-- <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
@stop

@section('js')
    {{-- <script>console.log('Dashboard Js')</script> --}}
@stop

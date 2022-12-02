@extends('adminlte::page')

@section('title', 'Dashboard - Instructor')

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



        <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">

              <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-laptop"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Cursos</span>
                      <span class="info-box-number">18</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Usuarios</span>
                      <span class="info-box-number">15</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-male"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Masculino</span>
                  <span class="info-box-number">
                    30
                    {{-- <small>%</small> --}}
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-female"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Femenino</span>
                  <span class="info-box-number">20</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->


          </div>
          <!-- /.row -->

        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->






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

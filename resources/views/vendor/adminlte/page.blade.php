@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@if($layoutHelper->isLayoutTopnavEnabled())
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

@section('adminlte_css')
    @stack('css')
        <style>
            .gap-2{
                gap:20px;
            }
            .content-wrapper, body {
                background-color: #eff7fd;
            }
            .card {
                box-shadow: inherit;
                border-radius: 14px;
                /* box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1); */
            }

            /* p {
                color: #354557;
            } */
            .sidebar-light-navy .nav-sidebar>.nav-item>.nav-link.active {
                background-color: #f5f5f5;
                font-weight: bold;
                color: #003876;
                font-size: 1.1rem;
            }
            [class*=sidebar-light-] .nav-sidebar>.nav-item>.nav-link.active {
                box-shadow: inherit;
            }
            .btn-primary {
                background-color: #003876;
            }
            .navbar-navy {
                background-color: #003876;
            }
            .tooltip {
                display: inline-block;
                opacity: .5;
            }
            .required {
                font-size: .5rem;
            }
            .bg-primary {
                background-color: rgb(0, 56, 118);
            }
            .bg-secondary {
                background-color: rgb(238, 42, 36);
            }
            .color-primary {
                color:rgb(0, 56, 118); /* #003876 */
            }
            .color-secondary {
                color:rgb(238, 42, 36); /* #EE2A24 */
            }
            .bg-accent {
                color: rgb(240, 153, 0); /* #F09900 */
            }
            .btn-secondary {
                color:rgb(255, 255, 255); /* #003876 */
                background-color: rgb(238, 42, 36);
            }
            .btn-accent {
                color:rgb(0, 56, 118); /* #003876 */
                background-color: #F2B449;
            }
            .btn-accent:hover {
                background-color: rgb(240, 153, 0);
            }

            .bg-gradient-warning {
                background: #fff2cb linear-gradient(180deg,#fff2cb,#fff2cb) repeat-x!important;
            }
            .alert-success {
                color: #28a745;
                background: #d8f6df;
                border-color: #d8f6df;
            }
            .alert-info {
                color: #17a2b8;
                background: #d4f5fa;
                border-color: #d4f5fa;
            }
            .alert-warning {
                color: #ffc107;
                background: #fff2cb;
                border-color: #fff2cb;
            }
            .alert-danger {
                color:#dc3545;
                background: #f9dcdf;
                border-color: #f9dcdf;
            }

            /* fontawesome custom styles*/
            aside.main-sidebar .fas, aside.main-sidebar .fa, aside.main-sidebar .far {
                color: #343a40;
            }
            aside.main-sidebar .active .fas, aside.main-sidebar .active .fa, aside.main-sidebar .active .far {
                color:#003876;
            }

            .page-item.active .page-link {
                background-color: #003876;
                border-color: #003876;
            }

            .object-cover {
                object-fit: cover;
            }

            .relative {
                position: relative;
            }
        </style>

    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        {{-- Top Navbar --}}
        @if($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        <div class="content-wrapper {{ config('adminlte.classes_content_wrapper') ?? '' }}">

            {{-- Content Header --}}
            <div class="content-header bg-white mb-4 shadow-sm">
                <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
                    @yield('content_header')
                </div>
            </div>

            {{-- Main Content --}}
            <div class="content">
                <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
                    @yield('content')
                </div>
            </div>
        </div>

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @stack('js')    

        <script>
             $(document).ready(function(){
                $('.tooltiptext').tooltip();
            });
        </script>
   
    @yield('js')
@stop

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale() ) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- PWA Meta tags -->

        <!-- Theme -->
        <meta name="theme-color" content="#003876">
        <!-- Optimized to screen width -->
        <meta name="MobileOptimized" content="width">
        <!-- Touch friendly -->
        <meta name="HandheldFriendly" content="true">
        <!-- IOs configuration -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <!-- IOs theme: default, black, black-translucent -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

        <!-- Icons -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

        <title>{{ str_replace('i', 'í', config('app.name', 'Capacítate')) }}</title>
        <!-- <title><?= config('app.name') ?></title> -->

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}">

        {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/mediaelementplayer.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/fl-bigmug-line.css') }}">

        <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />

        <!-- Flowbite CDN CSS for Tailwind interactive elements -->
        <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />

        {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="flex flex-col min-h-screen justify-between bg-gray-100">

            <!-- menu -->
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header) && request()->routeIs('creator.dashboard'))
                <header class="bg-white shadow">
                    <div class="w-full mx-auto py-6 px-4 sm:px-6 md:px-8 lg:px-10 xl:px-12 2xl:px-16">
                        {{ $header }}
                    </div>
                </header>
            @endif

            @include('sweet::alert')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Page Footer -->
            <footer class="main-footer bg-gray-800">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @include('partials.footer.footer')
                </div>
                <!-- Footer Copyright -->
                <section class="bg-gray-900">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white">
                        @include('partials.footer.copyright')
                    </div>
                </section>
            </footer>

        </div>

        @stack('modals')



        {{-- <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <script type="text/javascript" src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
        {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
        <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/mediaelement-and-player.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.stellar.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.countdown.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        {{-- <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script> --}}
        <script type="text/javascript" src="{{ asset('js/aos.js') }}"></script>

        <script type="text/javascript" src="{{ asset('js/main-front.js') }}"></script>

        <!-- Flowbite CDN JavaScript for Tailwind interactive elements -->
        <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

        @livewireScripts

        @isset ($js)
            {{ $js }}
        @endisset
    </body>
</html>

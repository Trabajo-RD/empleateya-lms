<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale() ) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}">

        {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/mediaelementplayer.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/fl-bigmug-line.css') }}">

        <link rel="stylesheet" href="{{ URL::asset('css/aos.css') }}" />

        {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="flex flex-col min-h-screen justify-between bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header) && request()->routeIs('creator.dashboard'))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

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
        <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
        <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
        <script type="text/javascript" src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/mediaelement-and-player.min.js') }}"></script>
        <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
        <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        {{-- <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script> --}}
        <script src="{{ asset('js/aos.js') }}"></script>

        <script type="text/javascript" src="{{ URL::asset('js/main-front.js') }}"></script>


        @livewireScripts

        @isset ($js)
            {{ $js }}
        @endisset
    </body>
</html>

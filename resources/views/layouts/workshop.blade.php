<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
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
        {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}">

        {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}"> --}}

        <!--Owl Carousel CSS -->
        {{-- <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}"> --}}

        {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/mediaelementplayer.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/fl-bigmug-line.css') }}">

        <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />

        <!-- Flowbite CDN CSS for Tailwind interactive elements -->
        <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />

        <!-- Custom Tailwind CSS -->
        <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}" />

        {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    <body class="font-sans antialiased">

        <!-- session message banner -->
        @if(session('success'))
            <x-jet-banner style="success" message="{{ session('success') }}"/>
        @endif

        @if(session('danger'))
            <x-jet-banner style="danger" message="{{ session('danger') }}"/>
        @endif

        <div class="flex flex-col min-h-screen justify-between bg-gray-100">

            <!-- menu -->
            {{-- @livewire('navigation-menu') --}}

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow z-50">
                    <div class="w-full mx-auto py-2 px-4 sm:px-6 md:px-8 lg:px-10 xl:px-12 2xl:px-16">
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
            <footer class="main-footer bg-primary">
                {{-- <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @include('partials.footer.footer')
                </div> --}}
                <!-- Footer Copyright -->
                <section class="bg-gray-800 bg-opacity-25">
                    <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8 text-white">
                        @include('partials.footer.copyright')
                    </div>
                </section>
            </footer>

        </div>

        @stack('modals')

        <!-- blade component floating action button -->
        <x-floatting-action-button />

        {{-- <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script type="text/javascript" src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
        {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}

        <script type="text/javascript" src="{{ asset('js/mediaelement-and-player.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.stellar.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.countdown.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        {{-- <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script> --}}
        <script type="text/javascript" src="{{ asset('js/aos.js') }}"></script>

        <script type="text/javascript" src="{{ asset('js/main-front.js') }}"></script>

        <!-- custom floatting action button js -->
        <script type="text/javascript" src="{{ asset('js/floatting-action-button.js') }}"></script>

        <!-- Flowbite CDN JavaScript for Tailwind interactive elements -->
        <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

        <!-- Owl Carousel Js -->
        {{-- <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script> --}}

        <!-- fontawesome -->
        {{-- <script src="https://kit.fontawesome.com/cece37c6b0.js" crossorigin="anonymous"></script> --}}

        {{-- <style>
            .owl-carousel .item {
              height: 10rem;
              background: #4DC7A0;
              padding: 1rem;
            }
            .owl-carousel .item h4 {
              color: #FFF;
              font-weight: 400;
              margin-top: 0rem;
             }
            </style> --}}
            <style>
                .categories-owl-carousel .owl-item img{
                    width: 7rem !important;
                }
            </style>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
            <script>
            jQuery(document).ready(function($){

                // top rated course owl carousel
                $('.top-rated-course-owl-carousel').owlCarousel({
                    loop:true,
                    margin:10,
                    nav:false,
                    dots:true,
                    autoplay:true,
                    autoplayTimeout:5000,
                    autoplayHoverPause:true,
                    responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:4
                    }
                    }
                });

                // home categories owl carousel
                $('.categories-owl-carousel').owlCarousel({
                    rtl:true,
                    loop:true,
                    margin:10,
                    nav:false,
                    dots:true,
                    autoplay:true,
                    autoplayTimeout:5000,
                    autoplayHoverPause:true,
                    responsive:{
                    0:{
                        items:2
                    },
                    600:{
                        items:4
                    },
                    1000:{
                        items:6
                    }
                    }
                });

                // home categories owl carousel
                $('.specific-learning-paths-owl-carowsel').owlCarousel({
                    loop:true,
                    margin:10,
                    nav:false,
                    dots:true,
                    responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                    }
                });

            });

    </script>

        @livewireScripts

        @isset ($js)
            {{ $js }}
        @endisset
    </body>
</html>

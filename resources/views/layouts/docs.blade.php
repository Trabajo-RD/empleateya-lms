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

        <title>{{ __('Documentation') }}</title>

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

        {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}

        <!-- Flowbite CDN CSS for Tailwind interactive elements -->
        <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!-- zero-md (markdown displayer component) -->
        <script src="https://cdn.jsdelivr.net/npm/@webcomponents/webcomponentsjs@2/webcomponents-loader.min.js"></script>
        <script type="module" src="https://cdn.jsdelivr.net/gh/zerodevx/zero-md@1/src/zero-md.min.js"></script>
        <script>
            // Set global configs. Declare before importing `zero-md` element.
            // These settings will apply to all instances of `zero-md`.
            window.ZeroMd = {
            config: {

            }
            };
        </script>

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="flex flex-col min-h-screen justify-between bg-gray-100">

            <!-- menu -->
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header) && request()->routeIs('creator.dashboard'))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            @include('sweet::alert')

            <!-- Page Content -->
            <div class="w-full mx-auto grid grid-cols-12 gap-6">

            <!-- aside menu -->
                <aside class="col-span-12 md:col-span-3 xl:col-span-3 2xl:col-span-2 px-10 md:pl-16 md:pr-12 py-12">

                    <h1 class="capitalize text-2xl mt-1">{{ __('Documentation') }}</h1>
                    <!-- sidebar menu -->
                    <ul class="text-md text-gray-600 mt-12">

                        <!-- prologue -->

                        <h2 class="capitalize font-bold text-md mt-2 mb-2 text-gray-900">{{ __('Prologue') }}</h2>

                        <!-- getting started -->
                        <li class="leading-7 mb-1 py-2 @routeIs('pages.docs.overview', [app()->getLocale()]) text-blue-900 @else border-transparent @endif pl-4">
                            {{-- <i class="fas fa-info-circle mr-2"></i> --}}
                            <a href="{{ route('pages.docs.overview', [app()->getLocale()] )}}" class="@routeIs('pages.docs.overview', [app()->getLocale()]) text-blue-900 font-bold @endif">{{ __('Overview') }}</a>
                        </li>

                        <h2 class="capitalize font-bold text-md mt-2 mb-2 text-gray-900">{{ __('Roles and Permissions') }}</h2>

                        <!-- roles and permissions -->

                        <!-- Roles -->
                        <li class="leading-7 mb-1 py-2 @routeIs('pages.docs.roles', [app()->getLocale()]) text-blue-900 @else border-transparent  @endif pl-4">
                            {{-- </i><i class="fas fa-user-lock mr-2"></i> --}}
                            <a href="{{ route('pages.docs.roles', [app()->getLocale()] )}}" class="@routeIs('pages.docs.roles', [app()->getLocale()]) text-blue-900 font-bold @endif">{{ __('Roles') }}</a>
                        </li>

                        <!-- Permissions -->
                        <li class="leading-7 mb-1 py-2 @routeIs('pages.docs.permissions', [app()->getLocale()]) text-blue-900 @else border-transparent @endif pl-4">
                            {{-- </i><i class="fas fa-user-lock mr-2"></i> --}}
                            <a href="{{ route('pages.docs.permissions', [app()->getLocale()] )}}" class="@routeIs('pages.docs.permissions', [app()->getLocale()]) text-blue-900 font-bold @endif">{{ __('Permissions') }}</a>
                        </li>

                        <h2 class="capitalize font-bold text-md mt-2 mb-2 text-gray-900">{{ __('News') }}</h2>

                        <!-- news -->

                        <!-- instructor news -->
                        <li class="leading-7 mb-1 py-2 @routeIs('pages.docs.news.instructor', [app()->getLocale()]) text-blue-900 @else border-transparent @endif pl-4">
                            {{-- <i class="fas fa-chalkboard-teacher mr-2"></i> --}}
                            <a href="{{ route('pages.docs.news.instructor', [app()->getLocale()] )}}" class="@routeIs('pages.docs.news.instructor', [app()->getLocale()]) text-blue-900 font-bold @endif">{{ __('News for Instructors') }}</a>
                        </li>

                        <!-- student news -->
                        <li class="leading-7 mb-1 py-2 @routeIs('pages.docs.news.student') text-blue-900 @else border-transparent @endif pl-4">
                            {{-- </i><i class="fas fa-user-graduate mr-2"></i> --}}
                            <a href="{{ route('pages.docs.news.student' )}}" class="@routeIs('pages.docs.news.student') text-blue-900 font-bold @endif">{{ __('News for Students') }}</a>
                        </li>

                        {{-- <!-- menu item -->
                        <li class="leading-7 mb-1 py-2 @routeIs('instructor.courses.curriculum', [app()->getLocale(), $course]) border-blue-900 text-blue-900 bg-white bg-opacity-80 filter hover:drop-shadow-lg @else border-transparent bg-white hover:bg-white bg-opacity-40 hover:bg-opacity-50 filter hover:drop-shadow-lg @endif pl-2">
                            <i class="fas fa-tv mr-2"></i>
                            <a href="{{ route('instructor.courses.curriculum', [app()->getLocale(), $course] )}}" class="@routeIs('instructor.courses.curriculum', [app()->getLocale(), $course]) text-blue-900 font-bold @endif">{{ __('Modules') }}</a>
                        </li>
                        <!-- menu item -->
                        <li class="leading-7 mb-1 py-2 border-l-4 @routeIs('instructor.courses.goals', [app()->getLocale(), $course]) border-blue-900 text-blue-900 bg-white bg-opacity-80 filter hover:drop-shadow-lg @else border-transparent bg-white hover:bg-white bg-opacity-40 hover:bg-opacity-50 filter hover:drop-shadow-lg @endif pl-2">
                            <i class="fas fa-flag mr-2"></i>
                            <a href="{{ route('instructor.courses.goals', [app()->getLocale(), $course]) }}" class="@routeIs('instructor.courses.goals', [app()->getLocale(), $course]) text-blue-900 font-bold @endif">{{ __('Course goals') }}</a>
                        </li>
                        <!-- menu item -->
                        <li class="leading-7 mb-1 py-2 border-l-4 @routeIs('instructor.courses.goals', [app()->getLocale(), $course]) border-blue-900 text-blue-900 bg-white bg-opacity-80 filter hover:drop-shadow-lg @else border-transparent bg-white hover:bg-white bg-opacity-40 hover:bg-opacity-50 filter hover:drop-shadow-lg @endif pl-2">
                            <i class="fas fa-user-shield mr-2"></i>
                            <a href="{{ route('instructor.courses.goals', [app()->getLocale(), $course]) }}" class="@routeIs('instructor.courses.goals', [app()->getLocale(), $course]) text-blue-900 font-bold @endif">{{ __('Permissions') }}</a>
                        </li>
                        <!-- menu item -->
                        <li class="leading-7 mb-1 py-2 border-l-4 @routeIs('instructor.courses.students', [app()->getLocale(), $course]) border-blue-900 text-blue-900 bg-white bg-opacity-80 filter hover:drop-shadow-lg @else border-transparent bg-white hover:bg-white bg-opacity-40 hover:bg-opacity-50 filter hover:drop-shadow-lg @endif pl-2">
                            <i class="fas fa-users mr-2"></i>
                            <a href="{{ route('instructor.courses.students', [app()->getLocale(), $course]) }}" class="@routeIs('instructor.courses.students', [app()->getLocale(), $course]) text-blue-900 font-bold @endif">{{ __('Students') }}</a>
                        </li>

                        @if( $course->observation )
                            <li class="flex leading-7 mb-1 py-2 border-l-4 @routeIs('instructor.courses.observation', [app()->getLocale(), $course]) border-blue-900 text-blue-900 bg-white bg-opacity-80 filter hover:drop-shadow-lg @else border-transparent bg-white hover:bg-white bg-opacity-40 hover:bg-opacity-50 filter hover:drop-shadow-lg @endif pl-2">
                                <a href="{{ route('instructor.courses.observation', [app()->getLocale(), $course]) }}" class="@routeIs('instructor.courses.observation', [app()->getLocale(), $course]) text-blue-900 font-bold @endif">{{ __('Observations') }}</a>
                                <!-- Tailwind animate ping -->
                                <span class="flex h-3 w-3">
                                    <span class="animate-ping h-3 w-3 absolute inline-flex rounded-full bg-red-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                                </span>
                                <!-- /Tailwind animate ping -->
                            </li>
                        @endif --}}
                    </ul>

                    {{-- <hr class="my-6">

                    <a href="{{ route('instructor.courses.preview', [app()->getLocale(), $course]) }}" target="_blank" class="btn bg-gray-300 text-gray-700 block w-full mb-4 text-center hover:shadow">
                        {{ __('Preview') }}
                    </a> --}}

                    {{-- @switch($course->status)
                        @case(1)
                            <!-- Request change course status -->
                            <form action="{{ route('instructor.courses.status', [app()->getLocale(), $course]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-accent w-full shadow">{{ __('Request review') }}</button>
                            </form>
                            @break
                        @case(2)
                            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                                <p class="font-bold">{{ __('Course in review') }}</p>
                                <p>{{ __('This course is under review') }}</p>
                            </div>

                            @break
                        @case(3)
                            <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
                                <div class="flex">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                <div>
                                    <p class="font-bold">{{ __('Course published') }}</p>
                                    <p class="text-sm">{{ __('This course is published') }}</p>
                                </div>
                                </div>
                            </div>
                            @break
                        @default

                    @endswitch --}}

                </aside>

                <!-- main content -->
                <main class="col-span-12 md:col-span-9 xl:col-span-9 2xl:col-span-10 card px-10 md:px-16 py-12">
                    <div class="card-body text-gray-600">
                        {{ $slot }}
                    </div>
                </main>

            </div>

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

        <!-- blade component floating action button -->
        <x-floatting-action-button />


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

        <!-- custom floatting action button js -->
        <script type="text/javascript" src="{{ asset('js/floatting-action-button.js') }}"></script>

        <!-- Flowbite CDN JavaScript for Tailwind interactive elements -->
        <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>


        @livewireScripts

        @isset ($js)
            {{ $js }}
        @endisset
    </body>
</html>

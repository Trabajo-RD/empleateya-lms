<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale() ) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Capacítate RD') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}">
        <link  href="http://fonts.googleapis.com/css?family=Reenie+Beanie:regular" rel="stylesheet" type="text/css">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="flex flex-col min-h-screen justify-between bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            {{-- @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <!-- Page Content -->
            <div class="container py-8 grid grid-cols-5 gap-6">

                <aside class="col-span-5 md:col-span-1 mb-8">

                    <h2 class="font-bold text-lg">Editar curso</h2>
                    <h1 class="capitalize text-2xl mt-1">{{ $course->title }}</h1>
                    <!-- sidebar menu -->
                    <ul class="text-md text-gray-600 mt-6">
                        <!-- menu item -->
                        <li class="leading-7 mb-1 py-2 border-l-4 @routeIs('creator.courses.edit', [app()->getLocale(), $course]) border-blue-900 text-blue-900 bg-white bg-opacity-80 filter hover:drop-shadow-lg @else border-transparent bg-white hover:bg-white bg-opacity-40 hover:bg-opacity-50 filter hover:drop-shadow-lg @endif pl-2">
                            <i class="fas fa-info-circle mr-2"></i>
                            <a href="{{ route('creator.courses.edit', [app()->getLocale(), $course] )}}" class=" @routeIs('creator.courses.edit', [app()->getLocale(), $course]) text-blue-900 font-bold @endif">{{ __('Course information') }}</a>
                        </li>
                        <!-- menu item -->
                        <li class="leading-7 mb-1 py-2 border-l-4 @routeIs('creator.courses.curriculum', [app()->getLocale(), $course]) border-blue-900 text-blue-900 bg-white bg-opacity-80 filter hover:drop-shadow-lg @else border-transparent bg-white hover:bg-white bg-opacity-40 hover:bg-opacity-50 filter hover:drop-shadow-lg @endif pl-2">
                            <i class="fas fa-tv mr-2"></i>
                            <a href="{{ route('creator.courses.curriculum', [app()->getLocale(), $course] )}}" class=" @routeIs('creator.courses.curriculum', [app()->getLocale(), $course]) text-blue-900 font-bold @endif">{{ __('Modules') }}</a>
                        </li>
                        <!-- menu item -->
                        <li class="leading-7 mb-1 py-2 border-l-4 @routeIs('creator.courses.goals', [app()->getLocale(), $course]) border-blue-900 text-blue-900 bg-white bg-opacity-80 filter hover:drop-shadow-lg @else border-transparent bg-white hover:bg-white bg-opacity-40 hover:bg-opacity-50 filter hover:drop-shadow-lg @endif pl-2">
                            <i class="fas fa-flag mr-2"></i>
                            <a href="{{ route('creator.courses.goals', [app()->getLocale(), $course]) }}" class=" @routeIs('creator.courses.goals', [app()->getLocale(), $course]) text-blue-900 font-bold @endif">{{ __('Course goals') }}</a>
                        </li>
                        <!-- menu item -->
                        <li class="leading-7 mb-1 py-2 border-l-4 @routeIs('creator.courses.goals', [app()->getLocale(), $course]) border-blue-900 text-blue-900 bg-white bg-opacity-80 filter hover:drop-shadow-lg @else border-transparent bg-white hover:bg-white bg-opacity-40 hover:bg-opacity-50 filter hover:drop-shadow-lg @endif pl-2">
                            <i class="fas fa-user-shield mr-2"></i>
                            <a href="{{ route('creator.courses.goals', [app()->getLocale(), $course]) }}" class=" @routeIs('creator.courses.goals', [app()->getLocale(), $course]) text-blue-900 font-bold @endif">{{ __('Permissions') }}</a>
                        </li>
                        <!-- menu item -->
                        <li class="leading-7 mb-1 py-2 border-l-4 @routeIs('creator.courses.students', [app()->getLocale(), $course]) border-blue-900 text-blue-900 bg-white bg-opacity-80 filter hover:drop-shadow-lg @else border-transparent bg-white hover:bg-white bg-opacity-40 hover:bg-opacity-50 filter hover:drop-shadow-lg @endif pl-2">
                            <i class="fas fa-users mr-2"></i>
                            <a href="{{ route('creator.courses.students', [app()->getLocale(), $course]) }}" class=" @routeIs('creator.courses.students', [app()->getLocale(), $course]) text-blue-900 font-bold @endif">{{ __('Students') }}</a>
                        </li>

                        @if( $course->observation )
                            <li class="flex leading-7 mb-1 border-l-4 @routeIs('creator.courses.observation', [app()->getLocale(), $course]) border-blue-900 text-blue-900 bg-white bg-opacity-80 filter hover:drop-shadow-lg @else border-transparent bg-white hover:bg-white bg-opacity-40 hover:bg-opacity-50 filter hover:drop-shadow-lg @endif pl-2">
                                <a href="{{ route('creator.courses.observation', [app()->getLocale(), $course]) }}" class=" @routeIs('creator.courses.observation', [app()->getLocale(), $course]) text-blue-900 font-bold @endif">{{ __('Observations') }}</a>
                                <!-- Tailwind animate ping -->
                                <span class="flex h-3 w-3">
                                    <span class="animate-ping h-3 w-3 absolute inline-flex rounded-full bg-red-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                                </span>
                                <!-- /Tailwind animate ping -->
                            </li>
                        @endif
                    </ul>

                    <hr class="my-6">

                    <a href="{{ route('creator.courses.preview', [app()->getLocale(), $course]) }}" target="_blank" class="btn bg-gray-300 text-gray-700 block w-full mb-4 text-center hover:shadow">
                        {{ __('Preview') }}
                    </a>

                    @switch($course->status)
                        @case(1)
                            <!-- Request change course status -->
                            <form action="{{ route('creator.courses.status', [app()->getLocale(), $course]) }}" method="POST">
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

                    @endswitch



                </aside>

                <main class="col-span-5 md:col-span-4 card">
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

        @livewireScripts
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        {{-- @include('sweetalert::alert') --}}
        {{-- @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"]) --}}
        <script>
            window.addEventListener('swal:modal', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                });
            });

            // SweetAlert on delete Module/Section
            window.addEventListener('swal:confirm', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if(willDelete) {
                        window.livewire.emit('destroy', event.detail.id);
                    }
                });
            });

            // SweetAlert on delete Module/Section
            window.addEventListener('swal:deletemoduleconfirm', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDeleteModule) => {
                    if(willDeleteModule) {
                        window.livewire.emit('destroy', event.detail.id);
                    }
                });
            });




            // SweetAlert on edit Module/Section title
            window.addEventListener('swal:edit', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                    buttons: true,
                    dangerMode: true,
                })
                .then((willEdit) => {
                    if(willEdit) {
                        window.livewire.emit('edit', event.detail.section);
                    }
                });
            });


            /*
             * LESSON ALERTS
             */

            // SweetAlert on edit Module/Section title
            window.addEventListener('swal:editlesson', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                    buttons: true,
                    dangerMode: true,
                })
                .then((willEditLesson) => {
                    if(willEditLesson) {
                        window.livewire.emit('edit', event.detail.lesson);
                    }
                });
            });

        </script>

        @isset ($js)
            {{ $js }}
        @endisset
    </body>
</html>

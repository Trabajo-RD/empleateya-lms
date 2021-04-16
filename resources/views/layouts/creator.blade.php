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
                    <ul class="text-sm text-gray-600 mt-6">
                        <li class="leading-7 mb-1 border-l-4 @routeIs('creator.courses.edit', [app()->getLocale(), $course]) border-blue-400 @else border-transparent @endif pl-2">
                            <a href="{{ route('creator.courses.edit', [app()->getLocale(), $course] )}}">Información del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('creator.courses.curriculum', [app()->getLocale(), $course]) border-blue-400 @else border-transparent @endif pl-2">
                            <a href="{{ route('creator.courses.curriculum', [app()->getLocale(), $course] )}}">Lecciones</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('creator.courses.goals', [app()->getLocale(), $course]) border-blue-400 @else border-transparent @endif pl-2">
                            <a href="{{ route('creator.courses.goals', [app()->getLocale(), $course]) }}">Metas del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('creator.courses.students', [app()->getLocale(), $course]) border-blue-400 @else border-transparent @endif pl-2">
                            <a href="{{ route('creator.courses.students', [app()->getLocale(), $course]) }}">Estudiantes</a>
                        </li>

                        @if( $course->observation )
                            <li class="flex leading-7 mb-1 border-l-4 @routeIs('creator.courses.observation', $course) border-blue-400 @else border-transparent @endif pl-2">
                                <a href="{{ route('creator.courses.observation', $course) }}">Observaciones</a>
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

                    @switch($course->status)
                        @case(1)
                            <!-- Request change course status -->
                            <form action="{{ route('creator.courses.status', [app()->getLocale(), $course]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-accent shadow">Solicitar revisión</button>
                            </form>
                            @break
                        @case(2)
                            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                                <p class="font-bold">Revisión</p>
                                <p>Este curso se encuentra en revisión</p>
                            </div>

                            @break
                        @case(3)
                            <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
                                <div class="flex">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                <div>
                                    <p class="font-bold">Publicado</p>
                                    <p class="text-sm">Este curso se encuentra publicado.</p>
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

        @isset ($js)
            {{ $js }}
        @endisset
    </body>
</html>

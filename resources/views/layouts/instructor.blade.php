<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
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
            <div class="container py-8 grid grid-cols-5">

                <aside class="col-span-5 md:col-span-1 mb-8">

                    <h2 class="font-bold text-lg">Editar curso</h2>
                    <h1 class="capitalize text-2xl mt-1">{{str_replace('-', ' ', $course)}}</h1>
                    <!-- sidebar menu -->
                    <ul class="text-sm text-gray-600 mt-6">
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-blue-400 @else border-transparent @endif pl-2">
                            <a href="{{ route('instructor.courses.edit', $course )}}">Información del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.curriculum', $course) border-blue-400 @else border-transparent @endif pl-2">
                            <a href="{{ route('instructor.courses.curriculum', $course )}}">Lecciones</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.goals', $course) border-blue-400 @else border-transparent @endif pl-2">
                            <a href="{{ route('instructor.courses.goals', $course) }}">Metas del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.students', $course) border-blue-400 @else border-transparent @endif pl-2">
                            <a href="{{ route('instructor.courses.students', $course) }}">Estudiantes</a>
                        </li>
                    </ul>

                </aside>

                <div class="col-span-5 md:col-span-4 card">

                    <main class="card-body text-gray-600">

                        {{ $slot }}

                    </main>

                </div>

            </div>
        </div>

        @stack('modals')

        @livewireScripts

        @isset ($js)
            {{ $js }}
        @endisset
    </body>
</html>

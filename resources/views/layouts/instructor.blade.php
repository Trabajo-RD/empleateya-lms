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
            <div class="container py-8 grid grid-cols-5 gap-6">

                <aside class="col-span-5 md:col-span-1 mb-8">

                    <h2 class="font-bold text-lg">Editar curso</h2>
                    <h1 class="capitalize text-2xl mt-1">{{ $course->title }}</h1>
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

                    <hr class="my-6">

                    @switch($course->status)
                        @case(1)
                            <!-- Request change course status -->
                            <form action="{{ route('instructor.courses.status', $course) }}" method="POST">
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

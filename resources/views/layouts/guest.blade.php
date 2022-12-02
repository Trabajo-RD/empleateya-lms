<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Flowbite CDN CSS for Tailwind interactive elements -->
        <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="py-12" style="background-color: #f3f4f6;">
            <div class="font-sans text-gray-900 antialiased">
                {{ $slot }}
            </div>
        </div>

        <!-- Page Footer -->
        {{-- <footer class="main-footer bg-gray-800">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                @include('partials.footer.footer')
            </div>
            <!-- Footer Copyright -->
            <section class="bg-gray-900">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white">
                    @include('partials.footer.copyright')
                </div>
            </section>
        </footer> --}}

        <!-- Flowbite CDN JavaScript for Tailwind interactive elements -->
        <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

    </body>
</html>

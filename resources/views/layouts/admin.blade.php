<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ __('Administration') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/buttons.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}">
        <link  href="http://fonts.googleapis.com/css?family=Reenie+Beanie:regular" rel="stylesheet" type="text/css">

        <!-- Flowbite CDN CSS for Tailwind interactive elements -->
        <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="flex flex-col min-h-screen justify-between bg-gray-100">

        <!-- admin responsive left sidebar -->
            {{-- @livewire('navigation-menu') --}}
            {{-- @livewire('admin-navbar') --}}

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- content wrapper -->
            <div class="wrapper relative min-h-screen md:flex">


                {{-- @livewire('admin-sidebar') --}}

                <!-- main content -->
                <main id="layout-admin-content" class="flex-1">
                    <div class="card-body text-gray-600">
                        {{ $slot }}
                    </div>
                </main>



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
        </div>

        @stack('modals')

        @livewireScripts
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/buttons.js') }}"></script>

        <!-- Flowbite CDN JavaScript for Tailwind interactive elements -->
        <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

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


            // SweetAlert on edit Module/Section title
            // SweetAlert on delete Module/Section
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

        </script>

        @isset ($js)
            {{ $js }}
        @endisset
    </body>
</html>

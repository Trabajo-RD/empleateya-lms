<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>

    <!-- Page Footer -->
    <x-slot name="footer">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap justify-center gap-x-6 gap-y-8 ">
            @livewire('link.social-media', ['icon_class' => 'fab fa-facebook-f'])
        </div>
    </x-slot>

    <!-- Page Copyright -->
    <x-slot name="copyright">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap justify-center gap-x-6 gap-y-8 ">
            &copy;Ministerio de Trabajo 2021
        </div>
    </x-slot>
</x-app-layout>

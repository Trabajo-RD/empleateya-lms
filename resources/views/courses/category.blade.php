<x-app-layout>

    <!-- hero -->
    <section class="bg-cover" style="background-image:linear-gradient(rgba(0, 56, 118, 0.7), rgba(35, 73, 116, 0.6)), url({{ asset( 'images/courses/hero9.jpg' ) }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <!-- titulo -->
                <h1 class="text-white font-extrabold text-3xl sm:text-4xl md:text-5xl">{{ __($category->name) }}</h1>
                <!-- parrafo -->
                <p class="text-white mt-3 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 mb-4">{{ __('If you are looking to be more competitive, get a job or start your own business, these courses are for you') }}</p>
                <!-- Buscador -->
                @livewire('search')
            </div>
        </div>
    </section>

    <main>
        @livewire('courses-index')
    </main>

    <!-- Page Footer -->
    @if(isset($footer))
    <footer class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $footer }}
        </div>
    </footer>
    @endif

    <!-- Page Copyright -->
    @if(isset($copyright))
    <section class="bg-gray-900">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white">
            {{ $copyright }}
        </div>
    </section>
    @endif

</x-app-layout>
